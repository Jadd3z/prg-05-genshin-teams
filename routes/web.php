<?php

use illuminate\database\Eloquent\Collection;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Team;
use App\Http\Controllers\ReviewController;

Route::get('/', function () {

    return view('home');
});


Route::get('/teams', function () {
    return view('teams', [
        'teams' => Team::all()
    ]);
});

Route::get('/teams/{id}', function ($id) {

    $team = Team::find($id);


    return view('team', ['team' => $team]);
});

Route::get('/contacts', function () {
    return view('contacts');
});

Route::post('/teams/{team}/reviews',
    [ReviewController::class, 'store'])->name('reviews.store');

// This is the route that defines the name 'teams.show'
Route::get('/teams/{team}', [TeamController::class, 'show'])->name('teams.show');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
