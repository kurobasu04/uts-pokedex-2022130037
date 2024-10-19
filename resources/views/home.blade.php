@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="text-center mb-4">
            <h1>POKEMON LOVERS</h1>
            <p>Explore The Pokemon</p>
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

            @auth
                @if ($pokemon->isEmpty())
                    <p class="text-center">No Pokémon found.</p>
                @else
                    <div class="row">
                        @foreach ($pokemon as $poke)
                            <div class="col-md-4 mb-4">
                                <div class="card text-center">
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#pokemonModal{{ $poke->id }}">
                                        <!-- Menampilkan foto Pokémon atau placeholder jika kosong -->
                                        <img src="{{ empty($poke->photo) ? url('https://placehold.co/200') : asset('storage/' . $poke->photo) }}"
                                            class="card-img-top small-image" alt="{{ $poke->name }}">

                                    </a>
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            <a href="#" data-bs-toggle="modal"
                                                data-bs-target="#pokemonModal{{ $poke->id }}">
                                                {{ str_pad($poke->id, 4, '0', STR_PAD_LEFT) }} - {{ $poke->name }}
                                            </a>
                                        </h5>
                                        <p class="card-text">
                                            <span class="badge rounded-pill bg-primary">{{ $poke->primary_type }}</span>
                                        </p>
                                    </div>
                                </div>

                                <!-- Modal untuk detail Pokémon -->
                                <div class="modal fade" id="pokemonModal{{ $poke->id }}" tabindex="-1"
                                    aria-labelledby="pokemonModalLabel{{ $poke->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="pokemonModalLabel{{ $poke->id }}">
                                                    {{ $poke->name }}
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- Membungkus gambar dengan hyperlink ke halaman show -->
                                                <a href="{{ route('pokemon.show', $poke->id) }}">
                                                    <img src="{{ empty($poke->photo) ? url('https://placehold.co/200') : asset('storage/' . $poke->photo) }}"
                                                        class="img-fluid"
                                                        style="max-width: 100%; max-height: 500px; object-fit: cover;"
                                                        alt="{{ $poke->name }}">
                                                </a>

                                                <h5>ID: {{ str_pad($poke->id, 4, '0', STR_PAD_LEFT) }}</h5>
                                                <p><strong>Primary Type:</strong>
                                                    <span
                                                        class="badge rounded-pill bg-primary">{{ $poke->primary_type }}</span>
                                                </p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal -->
                            </div>
                        @endforeach
                    </div>
                @endif
            @endauth
        </div>

        <!-- Pagination -->
        @auth
            <div class="d-flex justify-content-center mt-4">
                {{ $pokemon->links('pagination::bootstrap-5') }}
            </div>
        @endauth
    </div>
@endsection
