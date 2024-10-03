@extends('layouts.dashboard1')

@section('content')

    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Détails de l'étudiant</h3>
                    </div>

                    <div class="card-body">
                        <p><strong>Nom :</strong> {{ $student->nom }}</p>
                        <p><strong>Dernier année scolaire :</strong> {{ $student->scolaire }}</p>
                        <p><strong>Date de naissance :</strong> {{ $student->date }}</p>
                        <p><strong>Téléphone :</strong> {{ $student->téléphone }}</p>
                        <p><strong>Statut :</strong>
                            @if (strtolower($student->statut) === 'en cours')
                                <span class="badgee badgee-warning">{{ $student->statut }} </span>
                                <img class="status-img" src="{{ asset('images/inProgress.png') }}" alt="in progress"
                                    width="30px">
                            @else
                                <span class="badgee badgee-success">{{ $student->statut }} </span>
                                <img class="status-img" src="{{ asset('images/completed.png') }}" alt="completed"
                                    width="30px">
                            @endif
                        </p>
                        <form action="{{ route('update_statut', ['id' => $student->id]) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <strong><label for="statut">Mise à jour Statut</label></strong>
                                <select class="form-control" name="statut" id="statut">
                                    <option value="" selected disabled>Selectionner statut</option>
                                    <option value="en cours">En cours</option>
                                    <option value="complété">Complété</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Mettre à jour</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
