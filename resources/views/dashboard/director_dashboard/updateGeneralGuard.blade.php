@extends('layouts.directorLayout')
@section('title')
    Modifier
@endsection
@section('content')
    <div class="container d-flex justify-content-center align-items-center mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Modifier les informations de la Garde générale</h3>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('saveUpdate', $generalGuard->id) }}">
                            @method('PATCH')
                            @csrf
                            <div class="form-group mb-3">
                                <label for="intituléTache">le nom</label>
                                <input type="text" class="form-control" id="name" placeholder="nouveau nom"
                                    name="name" value="{{ $generalGuard->name }}">
                                @error('name')
                                    <span class="text  text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="date_tache">Adresse-email</label>
                                <input type="text" class="form-control" id="email"
                                    placeholder="Entrer la date de la tache" name="email"
                                    value="{{ $generalGuard->email }}">
                                @error('email')
                                    <span class="text  text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="Num_Employe">choisir le role:</label>

                                <select class="form-control" id="role" name="role">
                                    <option value="general_guard"
                                        {{ $generalGuard->role === 'general_guard' ? 'selected' : '' }}>Garde générale
                                    </option>
                                    <option value="teacher" {{ $generalGuard->role === 'teacher' ? 'selected' : '' }}>
                                        Professeur
                                    </option>
                                    <option value="director" {{ $generalGuard->role === 'director' ? 'selected' : '' }}>
                                        directeur</option>
                                </select>
                                @error('role')
                                    <span class="text  text-danger">{{ $message }}</span>
                                @enderror
                                <br>
                            </div>
                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
