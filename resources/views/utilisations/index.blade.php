@extends('layouts.dashboard1')

@section('content')
@section('title', 'Utilisations')


<div class="container">
    <div class="main-content">
        <div class="row">
            <div class="col-md-12">
                <div class="table-wrapper">
                    <div class="table-title">
                        <div class="row">
                            <div class="col-sm-6 p-0 flex justify-content-lg-start justify-content-center">
                                <h4 class="ml-lg-4">Liste des emploi de temps</h4>
                            </div>
                            <div class="col-sm-6 p-0 d-flex justify-content-end">
                                <a href="{{ route('utilisations.create') }}" class="btn" style="background-color: #db751b; color: #fff;">
                                    <ion-icon name="add-outline"></ion-icon>
                                    <span>Ajouter</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <form action="{{ route('filterByDepartementInZitouniDash') }}" method="GET" class="form-inline justify-content-end m-4">
                        <div class="form-group mr-2">
                            <select class="form-control" id="role" name="role">
                                <option value="" disabled selected>Recherche par classe</option>
                                @foreach ($utilisationss as $utilisation)
                                    <option value="{{ $utilisation->departement->name }}">{{ $utilisation->departement->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Filter</button>
                    </form>



<!-- Add Bootstrap JS -->

                    <table class="table">
                        <thead>
                            <tr>
                                <th>Classe</th>
                                <th>L'emploi de temps</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($utilisations as $utilisation)
                            <tr>
                                <td>{{ $utilisation->departement->name }}</td>
                                <td>
                                    <img src="{{ asset('imagess/' . $utilisation->image) }}" width="100px">
                                </td>
                                <td>
                                    <a href="{{ route('utilisations.edit', $utilisation->id) }}" class="btn btn-primary">Modifier</a>
                                    <form action="{{ route('utilisations.destroy', $utilisation->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
