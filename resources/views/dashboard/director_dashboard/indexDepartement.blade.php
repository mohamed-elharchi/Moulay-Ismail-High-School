@extends('layouts.directorLayout')
@section('title')
departement
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
            <a class="btn btn-success" href="{{ route('addDepartement') }}">Ajouter</a>
        </div>
    </div>

    <table class="table table-bordered">
        <tr>
            <th>Numero</th>
            <th>Département</th>
            <th>Liste des étudiants</th>
            <th>actionn</th>

        </tr>
        @foreach ($departements as $index => $departement)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $departement->name }}</td>
                <td>
                    <img src="{{ asset('imagess/' . $departement->students_list) }}" width="100px">
                </td>
                <td>
                    <form action="{{ route('deleteDepartement', $departement->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <a class="btn btn-primary" href="{{ route('updateDepartement', $departement->id) }}">Modifier</a>
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    <div class=" justify-content-center">
        {{ $departements->links() }}
    </div>
</div>


@endsection
