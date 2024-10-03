@extends('layouts.directorLayout')
@section('title')
    Responsables
@endsection
@section('content')

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-12">
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

            <div class="container mb-3">
                <div class="row justify-content-between">
                    <div class="col-lg-2">
                        <a class="btn btn-success" href="{{ route('addGeneralGuard') }}">Ajouter</a>
                    </div>
                    <div class="col-lg-4">
                        <form action="{{ route('filterGeneralGuards') }}" method="GET" class="form-inline">
                            <div class="row align-items-center">
                                <div class="col-sm-8 ">
                                    <div class="form-group ">
                                        <select class="form-control" id="role" name="role">
                                            <option value="" disabled selected>Tous les rôles</option>
                                            <option value="director">Directeur</option>
                                            <option value="teacher">Professeurs</option>
                                            <option value="general_guard">Surveillant général</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4 ">
                                    <button type="submit" class="btn btn-primary">Filtrer</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Numéro</th>
                        <th>Nom</th>
                        <th>Adresse e-mail</th>
                        <th>Le rôle</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($generalGuards as $index => $generalGuard)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $generalGuard->name }}</td>
                            <td>{{ $generalGuard->email }}</td>
                            <td>{{ $generalGuard->role }}</td>
                            <td>
                                <form action="{{ route('deleteGeneral_guard', $generalGuard->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a class="btn btn-primary" href="{{ route('updateGeneral_guard', $generalGuard->id) }}">Modifier</a>
                                    <button type="submit" class="btn btn-danger">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class=" justify-content-center">
                {{ $generalGuards->links() }}
            </div>
    </div>
</div>

@endsection
