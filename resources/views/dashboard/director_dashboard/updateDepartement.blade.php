@extends('layouts.directorLayout')
@section('title')
    Modifier
@endsection
@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center mt-4">
            <div class="col-md-8">
                @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h4>Modifier la classe {{ $departement->name }}</h4>
                    </div>

                    <div class="card-body">
                        <form method="post" action="{{ route('saveUpdateDepartement', $departement->id) }}" enctype="multipart/form-data">
                            @method('PATCH')
                            @csrf

                            <div class="form-group mb-3">
                                <label class="form-label" for="name">La classe:</label>
                                <input type="text" class="form-control" name="name" id="name"
                                    value="{{ $departement->name }}">
                            </div>

                            <div class="form-group mb-3">
                                <label class="form-label" for="image">Liste des étudiants:</label>
                                <input type="file" class="form-control" name="students_list" id="students_list">

                            </div>
                            <div class="form-group mb-3">

                                <h5>Liste des étudiants actuels:</h5>
                                <img src="{{ asset('imagess/' . $departement->students_list) }}" width="30%">
                            </div>

                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
