<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\UserController;
use App\Models\Team;

Route::get('/', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});


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

/// admin section
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});

Route::get('/profile', function () {
    return view('profile', [
        'user' => User::first()
    ]);
});
Route::middleware('auth')->group(function () {
    // Show the profile page
    Route::get('/profile', [UserController::class, 'show'])->name('profile.show');

    // Process the update
    Route::put('/profile', [UserController::class, 'update'])->name('profile.update');
});

Route::post('/admin/characters', [App\Http\Controllers\CharacterController::class, 'store'])
    ->name('admin.characters.store');


require __DIR__ . '/auth.php';
