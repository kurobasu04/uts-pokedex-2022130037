<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use Illuminate\Http\Request;

class PokedexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $pokemon = Pokemon::paginate(9);

        // send data to view 'home'
        return view('home', compact('pokemon'));
    }
}
