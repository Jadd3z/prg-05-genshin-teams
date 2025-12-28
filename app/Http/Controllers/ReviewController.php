<?php

namespace App\Http\Controllers;


use App\Models\Team;
use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{

    public function store(Request $request, Team $team)
    {
        // 1. Validation
        $validated = $request->validate([
            'body' => 'required|min:5|max:500',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        // 2. Save the Review using the Product relationship
        $team->reviews()->create($validated);

        // 3. Redirect back to the product's show page
        return redirect()->route('teams.show', $team) // No leading slash!
        ->with('success', 'Review added successfully!');
    }
}
