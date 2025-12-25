<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\TeamController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/contacts', function () {
    return view('contacts');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// --- TEAM ROUTES ---

Route::post('/teams/{team}/toggle', [TeamController::class, 'toggleStatus'])->name('teams.toggle');

// 1. Reviews (Custom route not covered by resource)
Route::post('/teams/{team}/reviews', [ReviewController::class, 'store'])->name('reviews.store');

// 2. The Resource Route
// This single line creates ALL the standard routes for you:
// GET /teams          -> TeamController@index  (Your Search Engine is here!)
// GET /teams/create   -> TeamController@create
// POST /teams         -> TeamController@store
// GET /teams/{team}   -> TeamController@show
// GET /teams/{team}/edit -> TeamController@edit
// PUT /teams/{team}   -> TeamController@update
// DELETE /teams/{team}-> TeamController@destroy
Route::resource('teams', TeamController::class);

require __DIR__ . '/auth.php';
