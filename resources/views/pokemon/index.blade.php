@extends('layouts.app')

@section('title', 'Pokemon List')

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <h1>Pokemon List</h1>
        <a href="{{ route('pokemon.create') }}" class="btn btn-primary">Add Pokemon</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-striped mt-4">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Species</th>
                <th>Primary Type</th>
                <th>Power</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pokemons as $pokemon)
                <tr>
                    <td>{{ str_pad($pokemon->id, 4, '0', STR_PAD_LEFT) }}</td>
                    <td>{{ $pokemon->name }}</td>
                    <td>{{ $pokemon->species }}</td>
                    <td>{{ $pokemon->primary_type }}</td>
                    <td>{{ $pokemon->hp + $pokemon->attack + $pokemon->defense }}</td>
                    <td>
                        <a href="{{ route('pokemon.edit', $pokemon->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('pokemon.destroy', $pokemon->id) }}" method="POST"
                            style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $pokemons->links() }}
@endsection
