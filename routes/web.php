<?php

use App\Http\Controllers\PokedexController;
use App\Http\Controllers\PokemonController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

// Route dashboard with PokedexController (__invoke)
Route::get('/', PokedexController::class)->name('home');

// Route CRUD
Route::resource('/pokemon', PokemonController::class);

// Redirect /home to dashboard '/'
Route::get('/home', function () {
    return redirect()->route('home');
});
