@extends('layouts.directorLayout')

@section('title', 'Ajouter Département')

@section('content')
    <div class="container-fluid mt-4">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3>Ajouter Département</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('saveDepartement') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <div class="form-group">
                                    <label for="name" class="form-label">Département</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="{{ old('name') }}" placeholder="Entrez le nom" autofocus>
                                    @error('name')
                                        <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="students_list" class="form-label">Liste des étudiants</label>
                                    <input type="file" class="form-control" id="students_list" name="students_list">
                                    @error('students_list')
                                        <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Ajoute</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
