@extends('layouts.directorLayout')
@section('title')
    Ajouter matières
@endsection
@section('content')
    <div class="container-fluid mt-4">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header"><h3>Ajouter matières</h3></div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('saveMatiere') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Matière</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}"
                                    placeholder="Entrez le nom" autofocus>
                                @error('name')
                                    <span class="text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
