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
}
