@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Pokemon</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('pokemon.update', $pokemon->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Pokemon Name</label>
                <input type="text" class="form-control" id="name" name="name"
                    value="{{ old('name', $pokemon->name) }}">
            </div>

            <div class="form-group">
                <label for="species">Species</label>
                <input type="text" class="form-control" id="species" name="species"
                    value="{{ old('species', $pokemon->species) }}">
            </div>

            <div class="form-group">
                <label for="primary_type">Primary Type</label>
                <select class="form-control" id="primary_type" name="primary_type">
                    @foreach (['Grass', 'Fire', 'Water', 'Bug', 'Normal', 'Poison', 'Electric', 'Ground', 'Fairy', 'Fighting', 'Psychic', 'Rock', 'Ghost', 'Ice', 'Dragon', 'Dark', 'Steel', 'Flying'] as $type)
                        <option value="{{ $type }}"
                            {{ old('primary_type', $pokemon->primary_type) == $type ? 'selected' : '' }}>{{ $type }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="photo">Photo</label>
                <input type="file" class="form-control" id="photo" name="photo">
            </div>

            <button type="submit" class="btn btn-success">Update Pokemon</button>
        </form>
    </div>
@endsection
