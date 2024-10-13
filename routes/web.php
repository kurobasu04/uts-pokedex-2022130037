<?php

use App\Http\Controllers\PokedexController;
use App\Http\Controllers\PokemonController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('home');
// })->name('home');

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::resource('/pokemon', PokemonController::class);

// Route::get('/', PokedexController::class)->name('home');

// Route root diarahkan ke PokedexController
Route::get('/', PokedexController::class)->name('home');

// Resource untuk route Pokémon (CRUD)
Route::resource('/pokemon', PokemonController::class);

Route::get('/home', function() {
    return redirect()->route('home');
});

