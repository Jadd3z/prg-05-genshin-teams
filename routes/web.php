<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\TeamController;
use App\Models\Team;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {

    return view('home');
});


Route::get('/teams', function () {
    return view('teams', [
        'teams' => Team::all()
    ]);
});


Route::get('/contacts', function () {
    return view('contacts');
});

Route::post('/teams/{team}/reviews',
    [ReviewController::class, 'store'])->name('reviews.store');

// This is the route that defines the name 'teams.show'
Route::get('/teams/{team}', [TeamController::class, 'show'])->name('teams.show');

//////////////////////////////////////////////

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// create routes

Route::get('/create', [TeamController::class, 'create'])->name('create');
// 2. Route to handle the form submission and create a new team
Route::post('/teams', [TeamController::class, 'store'])->name('teams.store');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
