@extends('layouts.app')

@section('title', 'Update Existing Pokemon')

@section('content')

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <hr>
                </div>
                <div class="mt-4 p-5 bg-dark text-white rounded text-center">
                    <h1>Update Existing Pokemon</h1>
                </div>

                <div class="row my-5">
                    <div class="col-12 px-5">
                        @if ($errors->any())
                            <div class="alert alert-danger mt-4">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('pokemon.update', $pokemon->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @method('PUT')
                            @csrf

                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <label for="name" class="form-label">Pokemon Name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="Pokemon Name" required value="{{ old('name', $pokemon->name) }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="species" class="form-label">Species</label>
                                    <input type="text" class="form-control" id="species" name="species"
                                        placeholder="Species" required value="{{ old('species', $pokemon->species) }}">
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <label for="primary_type" class="form-label">Primary Type</label>
                                    <select class="form-select" id="primary_type" name="primary_type" required>
                                        @foreach (['Grass', 'Fire', 'Water', 'Bug', 'Normal', 'Poison', 'Electric', 'Ground', 'Fairy', 'Fighting', 'Psychic', 'Rock', 'Ghost', 'Ice', 'Dragon', 'Dark', 'Steel', 'Flying'] as $type)
                                            <option value="{{ $type }}"
                                                {{ old('primary_type', $pokemon->primary_type) == $type ? 'selected' : '' }}>
                                                {{ $type }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="photo" class="form-label">Photo</label>
                                    <input type="file" class="form-control" id="photo" name="photo">
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <label for="weight" class="form-label">Weight</label>
                                    <input type="number" class="form-control" id="weight" name="weight"
                                        placeholder="Weight in kg" required value="{{ old('weight', $pokemon->weight) }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="height" class="form-label">Height</label>
                                    <input type="number" class="form-control" id="height" name="height"
                                        placeholder="Height in m" required value="{{ old('height', $pokemon->height) }}">
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <label for="hp" class="form-label">HP</label>
                                    <input type="number" class="form-control" id="hp" name="hp"
                                        placeholder="Hit Points" required value="{{ old('hp', $pokemon->hp) }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="attack" class="form-label">Attack</label>
                                    <input type="number" class="form-control" id="attack" name="attack"
                                        placeholder="Attack Points" required value="{{ old('attack', $pokemon->attack) }}">
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <label for="defense" class="form-label">Defense</label>
                                    <input type="number" class="form-control" id="defense" name="defense"
                                        placeholder="Defense Points" required
                                        value="{{ old('defense', $pokemon->defense) }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="is_legendary" class="form-label">Legendary</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="is_legendary"
                                            name="is_legendary" value="1"
                                            {{ old('is_legendary', $pokemon->is_legendary) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="is_legendary">
                                            Legendary Pokemon?
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between mb-4">
                                <a href="{{ route('pokemon.index') }}" class="btn btn-secondary">Back</a>
                                <button type="submit" class="btn btn-success">Update Pokemon</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
