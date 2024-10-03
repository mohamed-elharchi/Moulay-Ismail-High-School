@extends('layouts.directorLayout')
@section('title')
    Ajouter professeur
@endsection
@section('content')
    <div class="container-fluid mt-4">
        <div class="row justify-content-center align-items-center mt-4">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Ajouter</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('saveTeacher') }}">
                            @csrf

                            <div class="form-group">
                                <label for="name">Selectionner le nom de professeurs</label>
                                <select name="admin_id" id="name" class="form-control">
                                    <option value="" disabled selected>Tous les professeurs</option>
                                    @foreach ($teachers as $teacher)
                                        @if ($teacher)
                                            <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('admin_id')
                                    <span class="text text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="matiere">Selectionner un matière</label>
                                <select name="matiere_id" id="matiere" class="form-control">
                                    <option value="" disabled selected>Tous les Matière</option>
                                    @foreach ($matieres as $matiere)
                                        <option value="{{ $matiere->id }}">{{ $matiere->name }}</option>
                                    @endforeach
                                </select>
                                @error('matiere_id')
                                    <span class="text text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="departements">Selectionner les classes</label>
                                <select name="departement_ids[]" id="departements" class="form-control" multiple required>
                                    @foreach ($departements as $departement)
                                        <option value="{{ $departement->id }}">{{ $departement->name }}</option>
                                    @endforeach
                                </select>
                                @error('departement_ids')
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
