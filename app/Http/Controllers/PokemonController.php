<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class PokemonController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pokemon = Pokemon::paginate(20);
        return view('home', compact('pokemon'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pokemon.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'species' => 'required|string|max:100',
            'primary_type' => 'required|string|max:50',
            'photo' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('pokemon_photos', 'public');
            $validatedData['photo'] = $path;
        }

        Pokemon::create($validatedData);

        return redirect()->route('pokemon.index')->with('success', 'Pokemon added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pokemon = Pokemon::findOrFail($id);
        return view('pokemon.show', compact('pokemon'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pokemon = Pokemon::findOrFail($id);
        return view('pokemon.edit', compact('pokemon'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pokemon = Pokemon::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'species' => 'required|string|max:100',
            'primary_type' => 'required|string|max:50',
            'photo' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('photo')) {
            if ($pokemon->photo) {
                Storage::disk('public')->delete($pokemon->photo);
            }
            $path = $request->file('photo')->store('pokemon_photos', 'public');
            $validatedData['photo'] = $path;
        }

        $pokemon->update($validatedData);

        return redirect()->route('pokemon.index')->with('success', 'Pokemon updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pokemon = Pokemon::findOrFail($id);

        if ($pokemon->photo) {
            Storage::disk('public')->delete($pokemon->photo);
        }

        $pokemon->delete();

        return redirect()->route('pokemon.index')->with('success', 'Pokemon deleted successfully!');
    }
}
