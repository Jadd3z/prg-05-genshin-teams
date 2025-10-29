<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Team;


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
