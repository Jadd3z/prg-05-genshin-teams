<?php

namespace App\Http\Controllers;

use App\Models\Character;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 1. Eager load the character relationships for performance
        $teams = Team::with(['mainCharacter', 'supportCharacter1', 'supportCharacter2', 'supportCharacter3'])
            ->get();

        // 2. Return the view that lists all teams (your teams.blade.php)
        // NOTE: If your view is named 'teams.blade.php', the view call should be 'teams'
        return view('teams', [
            'teams' => $teams
        ]);
    }

    public function create()
    {
        $characters = Character::all();

        return view('create', [
            'characters' => $characters
        ]);
    }

    // NOTE: You already have a 'show' method defined in your web.php that needs to be here too:
    public function show(Team $team)
    {
        return view('team', [
            'team' => $team
        ]);
    }

    public function store(Request $request)
    {
// 1. Data Validation (Crucial for security and correctness)
        $validatedData = $request->validate([
            'TeamName' => 'required|string|max:255',
            'PrimaryReaction' => 'nullable|string|max:255',
            'MainCharacterID' => 'required|exists:characters,CharacterID', // Must exist in the characters table
            'SupportCharacter1ID' => 'nullable|exists:characters,CharacterID',
            'SupportCharacter2ID' => 'nullable|exists:characters,CharacterID',
            'SupportCharacter3ID' => 'nullable|exists:characters,CharacterID',
        ]);

        // 2. Data Persistence (Saving to the database)
        // Create a new Team model instance and fill it with the validated data
        $team = Team::create($validatedData);

        // 3. Redirection
        // Redirect the user to the newly created team's view page
        return redirect()->route('teams.show', $team->TeamID)
            ->with('success', 'Team "' . $team->TeamName . '" created successfully!');
    }

    public function edit(Team $team)
    {
        // 1. Fetch all characters to populate the dropdowns
        $characters = Character::orderBy('Name')->get();

        // 2. Pass the specific team and the list of characters to the view
        return view('teams.edit', [
            'team' => $team,
            'characters' => $characters,
        ]);
    }

    public function update(Request $request, Team $team)
    {
        // 1. Data Validation (Uses the same rules as 'store' but with different actions)
        $validated = $request->validate([
            'TeamName' => 'required|string|max:255',
            'PrimaryReaction' => 'nullable|string|max:255',
            'MainCharacterID' => 'required|exists:characters,CharacterID',
            'SupportCharacter1ID' => 'nullable|exists:characters,CharacterID',
            'SupportCharacter2ID' => 'nullable|exists:characters,CharacterID',
            'SupportCharacter3ID' => 'nullable|exists:characters,CharacterID',
        ]);

        // 2. Update the team record using the validated data
        $team->update($validated);

        // 3. Redirection
        // Redirect the user back to the team's detail page
        return redirect()->route('teams.show', $team)->with('success', 'Team updated successfully!');
    }

    public function destroy(Team $team)
    {
        // 1. Delete the team record
        $team->delete();

        // 2. Redirect back to the teams list page (index)
        return redirect()->route('teams.index')
            ->with('success', 'Team "' . $team->TeamName . '" deleted successfully!');
    }
}
