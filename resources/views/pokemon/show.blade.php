@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1>Detail Pokemon</h1>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        @if ($pokemon->photo)
                            <img src="{{ asset('storage/' . $pokemon->photo) }}" alt="{{ $pokemon->name }}" class="img-fluid">
                        @else
                            <img src="https://placehold.co/200" alt="No Image Available" class="img-fluid">
                        @endif
                    </div>
                    <div class="col-md-8 text-start"> <!-- text-start untuk rata kiri -->
                        <h3>#{{ str_pad($pokemon->id, 4, '0', STR_PAD_LEFT) }} {{ $pokemon->name }}</h3>
                        <p><strong>Species:</strong> {{ $pokemon->species }}</p>
                        <p><strong>Primary Type:</strong> <span class="badge bg-success">{{ $pokemon->primary_type }}</span>
                        </p>
                        <p><strong>Weight:</strong> {{ $pokemon->weight }} kg</p>
                        <p><strong>Height:</strong> {{ $pokemon->height }} m</p>
                        <p><strong>HP:</strong> {{ $pokemon->hp }}</p>
                        <p><strong>Attack:</strong> {{ $pokemon->attack }}</p>
                        <p><strong>Defense:</strong> {{ $pokemon->defense }}</p>
                        <p><strong>Legendary:</strong> {{ $pokemon->is_legendary ? 'Yes' : 'No' }}</p>
                    </div>
                </div>

                <a href="{{ route('pokemon.index') }}" class="btn btn-secondary mt-4">Back to List</a>
            </div>
        </div>
    </div>
@endsection
