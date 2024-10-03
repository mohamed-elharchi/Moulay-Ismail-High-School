@extends('layouts.teacherLayout')
@section('title', 'Absence')
@section('content')
    <div class="container mt-5">

        <div class="row justify-content-center">

            <div class="col-md-8">
                <div class="card">
                    @if (session('success'))
                        <div class="alert alert-primary" role="alert">
                            <p>{{ session('success') }}</p>
                        </div>
                    @endif
                    <div class="card-header">Bienvenue, {{ $teacher->name }}</div>
                    <div class="card-body">
                        <h2>Votre classes:</h2>
                        <form action="{{ route('displayAbsence') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="department">Selectioner la classe:</label>
                                <select class="form-control" id="department" name="department">
                                    <option value="" selected disabled >Selectionner classe</option>
                                    @foreach ($departements as $departement)
                                        <option value="{{ $departement->id }}">{{ $departement->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Confirmer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
