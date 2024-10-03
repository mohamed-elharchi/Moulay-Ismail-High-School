@extends('layouts.directorLayout')
@section('title')
Matieres
@endsection
@section('content')

@if ($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('success'))
    <div class="alert alert-success" role="alert">
        <p>{{ session('success') }}</p>
    </div>
@endif



<div class="container mt-4">
    <div class="row justify-content-between mb-3">
        <div class="col-lg-2">
            <a class="btn btn-success" href="{{ route('addMatiere') }}">Ajouter</a>
        </div>
    </div>

    <table class="table table-bordered">
        <tr>
            <th>Numero</th>
            <th>Matieres</th>
            <th>action</th>
        </tr>
        @foreach ($matieres as $index => $matiere)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $matiere->name }}</td>
                <td>
                    <form action="{{ route('deleteMatiere', $matiere->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                </td>
            </tr>
        @endforeach

    </table>
    <div class=" justify-content-center">
        {{ $matieres->links() }}
    </div>
</div>


@endsection
