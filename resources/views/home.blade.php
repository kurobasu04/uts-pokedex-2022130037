{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="text-center mb-4">
            <h1>Pokédex</h1>
            <p>Explore all Pokémon</p>
        </div>

        <!-- Menampilkan grid card -->
        <div class="row">
            @foreach ($pokemons as $pokemon)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <!-- Menampilkan gambar Pokémon -->
                        @if ($pokemon->photo)
                            <img src="{{ asset('storage/' . $pokemon->photo) }}" class="card-img-top"
                                alt="{{ $pokemon->name }}">
                        @else
                            <img src="https://placehold.co/200" class="card-img-top" alt="No Image Available">
                        @endif

                        <div class="card-body text-center">
                            <h5 class="card-title">#{{ str_pad($pokemon->id, 4, '0', STR_PAD_LEFT) }} {{ $pokemon->name }}
                            </h5>
                            <p class="card-text">
                                <span class="badge bg-success">{{ $pokemon->primary_type }}</span>
                            </p>
                            <!-- Link ke halaman detail Pokémon -->
                            <a href="{{ route('pokemon.show', $pokemon->id) }}" class="btn btn-primary">View Details</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-center mt-4">
            {{ $pokemons->links() }}
        </div>
    </div>
@endsection
