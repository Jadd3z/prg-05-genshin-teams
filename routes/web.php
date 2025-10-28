<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

class Team
{

}

$teams = [
    [
        'id' => 1,
        'reaction' => 'bloom',
        'elements' => 'Hydro and Dendro'
    ],
    [
        'id' => 2,
        'reaction' => 'vape',
        'elements' => 'Hydro and Pyro'
    ],

    [
        'id' => 3,
        'reaction' => 'Freeze',
        'elements' => 'Hydro and Cryo'
    ]

];

Route::get('/teams', function () use ($teams) {
    return view('teams', [
        'teams' => $teams
    ]);
});

Route::get('/teams/{id}', function ($id) use ($teams) {

    $team = Arr::first($teams, fn($team) => $team['id'] == $id);


    return view('team', ['team' => $team]);
});

Route::get('/contacts', function () {
    return view('contacts');
});

Route::get('/', function () {
    return view('home');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
