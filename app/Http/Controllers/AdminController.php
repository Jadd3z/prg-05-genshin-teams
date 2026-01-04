<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\Character;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        // 1. Fetch dropdown data
        $reactions = Team::select('PrimaryReaction')->distinct()->pluck('PrimaryReaction');
        $elements = Character::select('Element')->distinct()->pluck('Element');

        // 2. Fetch ALL teams
        $teams = Team::with('mainCharacter')->get();

        // 3. Fetch latest team
        $latestTeam = Team::with(['mainCharacter', 'user'])->latest()->first();

        return view('admin.dashboard', [
            'teams' => $teams,
            'reactions' => $reactions,
            'elements' => $elements,
            'latestTeam' => $latestTeam
        ]);
    }
}
