<?php

namespace App\Http\Controllers;

use App\Models\Character;
use Illuminate\Http\Request;

class CharacterController extends Controller
{
    public function store(Request $request)
    {
        // 1. Validate the input
        $validated = $request->validate([
            'Name' => 'required|string|max:255',
            'Element' => 'required|string|max:255', // You could use 'in:Pyro,Hydro,etc' if you want strict rules
        ]);

        // 2. Create the Character
        Character::create($validated);

        // 3. Redirect back to the dashboard
        return redirect()->route('admin.dashboard')->with('success', 'New character added successfully!');
    }
}

