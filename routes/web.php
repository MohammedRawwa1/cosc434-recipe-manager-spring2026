<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\RecipeController;

// Register a short alias for the demo middleware so routes can use 'demo.auth'
app('router')->aliasMiddleware('demo.auth', \App\Http\Middleware\EnsureUserIsLoggedIn::class);

Route::get('/', function () {
    return view('welcome');
});

// Demo login / logout (session flag)
Route::get('/login-demo', function (Request $request) {
    $request->session()->put('logged_in', true);
    return redirect()->route('recipes.index')->with('success', 'Demo login activated.');
});

Route::get('/logout-demo', function (Request $request) {
    $request->session()->forget('logged_in');
    return redirect()->route('recipes.index')->with('success', 'Logged out.');
});

// Public route: index
Route::get('/recipes', [RecipeController::class, 'index'])->name('recipes.index');

// Protected management routes (create/store/edit/update/destroy)
// placed BEFORE the show route so '/recipes/create' is not captured by the {recipe} pattern
Route::middleware('demo.auth')->group(function () {
    Route::get('/recipes/create', [RecipeController::class, 'create'])->name('recipes.create');
    Route::post('/recipes', [RecipeController::class, 'store'])->name('recipes.store');
    Route::get('/recipes/{recipe}/edit', [RecipeController::class, 'edit'])->name('recipes.edit');
    Route::put('/recipes/{recipe}', [RecipeController::class, 'update'])->name('recipes.update');
    Route::delete('/recipes/{recipe}', [RecipeController::class, 'destroy'])->name('recipes.destroy');
});

// Public route: show (kept last so parameter routes don't clash with static paths)
Route::get('/recipes/{recipe}', [RecipeController::class, 'show'])->name('recipes.show');
