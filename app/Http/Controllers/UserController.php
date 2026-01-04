<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{

    public function show()
    {
        // 1. Check if user is logged in (Redirect to Register if not)
        if (!auth()->check()) {
            return redirect()->route('register');
        }

        // 2. Return the view with the user data
        return view('profile', ['user' => auth()->user()]);
    }

    public function update(Request $request)
    {
        // 1. Validate the input
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                // Ensure email is unique, but ignore the current user's ID
                Rule::unique('users')->ignore(auth()->id()),
            ],
        ]);

        // 2. Update the user
        $request->user()->update($validated);

        // 3. Redirect back with a success message
        return back()->with('success', 'Profile updated successfully!');
    }
}
