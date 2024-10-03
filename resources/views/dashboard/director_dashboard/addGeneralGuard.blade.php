@extends('layouts.directorLayout')
@section('title')
    Ajouter un garde général
@endsection
@section('content')
    <div class="container-fluid mt-4">
        <div class="row justify-content-center align-items-center mt-4">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3>Ajouter responsable</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('saveGeneralGuard') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Nom</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}"
                                    placeholder="Entrez le nom" autofocus>
                                @error('name')
                                    <span class="text text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Adresse e-mail</label>
                                <input type="email" name="email" class="form-control" id="email"
                                    value="{{ old('email') }}"
                                    placeholder="example@gmail.com">
                                @error('email')
                                    <span class="text text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="role" class="form-label">le rôle:</label>
                                <select class="form-control" id="role" name="role">
                                    <option value="" selected disabled>Choisir le rôle</option>
                                    <option value="general_guard">Surveillant général</option>
                                    <option value="teacher">Professeur</option>
                                    {{-- <option value="director">directeur</option> --}}
                                </select>
                                @error('role')
                                    <span class="text text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Mot de passe</label>
                                <input type="password" class="form-control" id="password" name="password"
                                    autocomplete="new-password">
                                @error('password')
                                    <span class="text text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">Confirmez le mot de passe</label>
                                <input id="password_confirmation" type="password" name="password_confirmation" class="form-control">
                                @error('password_confirmation')
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
