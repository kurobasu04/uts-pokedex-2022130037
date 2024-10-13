@extends('layouts.app')

@section('title', 'Pokemon List')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h3 class="text-center">POKEMON LIST</h3>
                    <hr>
                </div>
                <div class="card border-0 shadow-sm rounded table-responsive">
                    <div class="card-body">
                        <!-- Wrapper -->
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <!-- Search -->
                            <input type="text" id="search" class="form-control me-2" placeholder="Search by Name"
                                style="width: 40%;">
                            <!-- Add Pokemon -->
                            <a href="{{ route('pokemon.create') }}" class="btn btn-md btn-success">ADD POKEMON</a>
                        </div>

                        @if (session('success'))
                            <div class="alert alert-success mt-4">
                                {{ session('success') }}
                            </div>
                        @endif

                        <table class="table table-bordered table-hover text-center">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col"><b>ID</b></th>
                                    <th scope="col"><b>Name</b></th>
                                    <th scope="col"><b>Species</b></th>
                                    <th scope="col"><b>Primary Type</b></th>
                                    <th scope="col"><b>Power</b></th>
                                    <th scope="col"><b>ACTIONS</b></th>
                                </tr>
                            </thead>
                            <tbody id="pokemon-list">
                                @forelse ($pokemon as $poke)
                                    <tr>
                                        <th scope="row">{{ str_pad($poke->id, 4, '0', STR_PAD_LEFT) }}</th>
                                        <td>{{ $poke->name }}</td>
                                        <td>{{ $poke->species }}</td>
                                        <td>{{ $poke->primary_type }}</td>
                                        <td>{{ $poke->hp + $poke->attack + $poke->defense }}</td>
                                        <td class="text-center d-flex justify-content-center gap-2">
                                            <!-- Show/Detail -->
                                            <a href="{{ route('pokemon.show', $poke->id) }}"
                                                class="btn btn-sm btn-info">SHOW</a>
                                            <!-- Edit -->
                                            <a href="{{ route('pokemon.edit', $poke->id) }}"
                                                class="btn btn-sm btn-warning">EDIT</a>
                                            <!-- Delete -->
                                            <form action="{{ route('pokemon.destroy', $poke->id) }}" method="POST"
                                                class="d-inline-block">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Are you sure?')">DELETE</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">No Pokémon found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                        <div class="d-flex justify-content-center mt-4">
                            {{ $pokemon->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- jQuery search --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#search').on('keyup', function() {
                var value = $(this).val().toLowerCase();
                var found = false;

                $('#pokemon-list tr').filter(function() {
                    var pokemonName = $(this).find('td:nth-child(2)').text().toLowerCase();
                    var isVisible = pokemonName.indexOf(value) > -1;
                    $(this).toggle(isVisible);
                    if (isVisible) {
                        found = true;
                    }
                });

                if (found) {
                    $('#no-results').addClass('d-none'); // hide message
                } else {
                    $('#no-results').removeClass('d-none'); // show message
                }
            });
        });
    </script>
@endsection
