@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="text-center mb-4">
            <h1>Pokédex</h1>
            <p>Explore all Pokémon</p>
        </div>

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
                        @guest
                            {{ __('Please log in!') }}
                        @else
                            {{ __('You are logged in!') }}
                        @endguest
                    </div>
                </div>
            </div>

            <div class="row">
                @foreach ($pokemons as $pokemon)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <!-- Menampilkan gambar Pokémon, jika kosong menggunakan placeholder -->
                            <a href="{{ route('pokemon.show', $pokemon->id) }}">
                                <img src="{{ $pokemon->image_url ?? 'https://placehold.co/200' }}" class="card-img-top"
                                    alt="{{ $pokemon->name }}">
                            </a>
                            <div class="card-body">
                                <!-- Menampilkan ID Pokémon dengan format padding -->
                                <h5 class="card-title">
                                    <a href="{{ route('pokemon.show', $pokemon->id) }}">
                                        {{ str_pad($pokemon->id, 4, '0', STR_PAD_LEFT) }} - {{ $pokemon->name }}
                                    </a>
                                </h5>
                                <p class="card-text">
                                    <!-- Menampilkan tipe Pokémon dalam bentuk pill badges -->
                                    @foreach (explode('/', $pokemon->type) as $type)
                                        <span class="badge rounded-pill bg-primary">{{ $type }}</span>
                                    @endforeach
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-center mt-4">
            {{ $pokemons->links() }}
        </div>
    </div>
@endsection
