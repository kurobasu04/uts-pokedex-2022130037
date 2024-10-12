@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $pokemon->name }}</h1>

        <div class="card">
            <img src="{{ $pokemon->photo ? asset('storage/' . $pokemon->photo) : 'https://placehold.co/200' }}"
                class="card-img-top" alt="{{ $pokemon->name }}">
            <div class="card-body">
                <h5 class="card-title">#{{ str_pad($pokemon->id, 4, '0', STR_PAD_LEFT) }} - {{ $pokemon->name }}</h5>
                <p>Species: {{ $pokemon->species }}</p>
                <p>Type: {{ $pokemon->primary_type }}</p>
                <p>Weight: {{ $pokemon->weight }} kg</p>
                <p>Height: {{ $pokemon->height }} m</p>
                <p>Power: HP: {{ $pokemon->hp }}, Attack: {{ $pokemon->attack }}, Defense: {{ $pokemon->defense }}</p>
            </div>
        </div>
    </div>
@endsection
