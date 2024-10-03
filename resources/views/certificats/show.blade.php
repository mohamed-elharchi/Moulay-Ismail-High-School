@extends('layouts.dashboard1')

@section('content')
@section('title', 'Certificates')


<div class="container mt-4">
    <h2>Détails du Certificat</h2>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">ID : {{ $certificat->id }}</h5>
            <p class="card-text"><strong>Nom Complet :</strong> {{ $certificat->nom_complet }}</p>
            <p class="card-text"><strong>Date de Naissance :</strong> {{ $certificat->date_naissance }}</p>
            <p class="card-text"><strong>Code MSSAR :</strong> {{ $certificat->code_mssar }}</p>
            <p class="card-text"><strong>Numéro de Téléphone :</strong> {{ $certificat->numero_telephone }}</p>
            <p class="card-text "><strong>Statut :</strong>
                @if (strtolower($certificat->statut) === 'en cours')
                    <span class="badgee badgee-warning">{{ $certificat->statut }} </span>
                    <img class="status-img" src="{{ asset('images/inProgress.png') }}" alt="in progress" width="30px%">
                @else
                    <span class="badgee badgee-success">{{ $certificat->statut }} </span>
                    <img class="status-img" src="{{ asset('images/completed.png') }}" alt="completed"  width="30px%">
                @endif
            </p>
            <form action="{{ route('update_statuttt', ['id' => $certificat->id]) }}" method="post">
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
@endsection
