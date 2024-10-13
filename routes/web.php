<?php

use App\Http\Controllers\PokedexController;
use App\Http\Controllers\PokemonController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

// Route home with __invoke
Route::get('/', PokedexController::class)->name('home');

// Route index Pokemon
Route::get('/pokemon', [PokemonController::class, 'index'])->name('pokemon.index');

// Route CRUD
Route::resource('pokemon', PokemonController::class)->except(['index']);
