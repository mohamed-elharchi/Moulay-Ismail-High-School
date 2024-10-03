@extends('layouts.dashboard1')

@section('content')

        <div class="container">
    <div class="main-content">
        <div class="row">
            <div class="col-md-12">
                <div class="table-wrapper">

                    <div class="table-title">
                        <div class="row">
                            <div class="col-sm-8 p-0 flex justify-content-lg-start justify-content-center">
                                <h4 class="ml-lg-4">Créer une nouvelle utilisation du temps </h4>
                            </div>
                            <div class="col-sm-4 p-0 d-flex justify-content-end">
                                <a href="{{ route('utilisations.index') }}" class="btn" style="background-color:#db751b; color: #fff;">
                                    <ion-icon name="arrow-undo-outline"></ion-icon> <span>Retour</span>
                                </a>
                            </div>
                        </div>
                    </div>

        <form action="{{ url('utilisations') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="department">Selectionner la classe:</label>
                <select class="form-control" id="department" name="departement_id">
                    <option value="" selected disabled>selectionner un classe</option>
                    @foreach ($departements as $departement)
                        <option value="{{ $departement->id }}">{{ $departement->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="image">L'emploi de temps</label>
                <input type="file" class="form-control" id="image" name="image"  placeholder="Entrez le chemin de l'image">
            </div>
            <button type="submit" class="btn btn-primary">Confiremer</button>
        </form>
    </div>
    </div>
    </div>
    </div>
    </div>
@endsection
