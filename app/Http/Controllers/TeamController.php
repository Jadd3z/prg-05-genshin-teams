<?php

namespace App\Http\Controllers;

use App\Models\Character;
use App\Models\Team;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @return Factory|View|\Illuminate\View\View
     */
    public function index(Request $request)
    {

        // Start building the query
        $query = Team::with(['mainCharacter', 'supportCharacter1', 'supportCharacter2', 'supportCharacter3']);

        // 1. Search by Team Name OR Primary Reaction
        $query->when($request->filled('search'), function ($q) use ($request) {
            $q->where(function ($subQuery) use ($request) {
                $subQuery->where('TeamName', 'like', '%' . $request->search . '%')
                    ->orWhere('PrimaryReaction', 'like', '%' . $request->search . '%');
            });
        });

        // 2. Filter by Reaction (Category)
        $query->when($request->filled('reaction'), function ($q) use ($request) {
            $q->where('PrimaryReaction', $request->reaction);
        });

        // 3. Filter by Main Character Element (Advanced Relationship Filter)
        // "Show me teams where the Main Character is Pyro"
        $query->when($request->filled('element'), function ($q) use ($request) {
            $q->whereHas('mainCharacter', function ($subQuery) use ($request) {
                $subQuery->where('Element', $request->element);
            });
        });

        // Execute the query
        $teams = $query->get();

        // Get all unique reactions/elements for the filter dropdowns to avoid hardcoding
        $reactions = Team::select('PrimaryReaction')->distinct()->pluck('PrimaryReaction');
        $elements = Character::select('Element')->distinct()->pluck('Element');

        return view('teams', [
            'teams' => $teams,
            'reactions' => $reactions,
            'elements' => $elements
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

        $validatedData['user_id'] = auth()->id();


        // Create a new Team model instance and fill it with the validated data
        $team = Team::create($validatedData);

        // 3. Redirection
        // Redirect the user to the newly created team's view page
        return redirect()->route('teams.show', $team->TeamID)
            ->with('success', 'Team "' . $team->TeamName . '" created successfully!');
    }

    public function edit(Team $team)
    {

        if ($team->user_id !== auth()->id() && !auth()->user()->is_admin) {
            abort(403, 'Unauthorized action.');
        }

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
        if ($team->user_id !== auth()->id() && !auth()->user()->is_admin) {
            abort(403, 'Unauthorized action.');
        }
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

        if ($team->user_id !== auth()->id() && !auth()->user()->is_admin) {
            abort(403, 'Unauthorized action.');
        }

        // 1. Delete the team record
        $team->delete();

        // 2. Redirect back to the teams list page (index)
        return redirect()->route('teams.index')
            ->with('success', 'Team "' . $team->TeamName . '" deleted successfully!');
    }

    public function toggleStatus(Team $team)
    {

        if ($team->user_id !== auth()->id() && !auth()->user()->is_admin) {
            abort(403, 'Unauthorized action.');
        }

        // Toggle the boolean value
        $team->update(['is_active' => !$team->is_active]);

        // Redirect back to the list
        return back()->with('success', 'Status updated');
    }

}
