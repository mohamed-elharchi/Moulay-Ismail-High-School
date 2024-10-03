@extends('layouts.dashboard1')

@section('content')
    <div class="container">
        <div class="main-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="table-wrapper">

                        <div class="table-title">
                            <div class="row">
                                <div class="col-sm-6 p-0 flex justify-content-lg-start justify-content-center">
                                    <h4 class="ml-lg-4">Modifier L'emploi de temps</h4>
                                </div>
                                <div class="col-sm-6 p-0 d-flex justify-content-end">
                                    <a href="{{ route('utilisations.index') }}" class="btn"
                                        style="background-color:#db751b; color: #fff;">
                                        <ion-icon name="arrow-undo-outline"></ion-icon> <span>Retour</span>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <form action="{{ route('utilisations.update', $utilisation->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="image">L'emploi de temps :</label>
                                <input type="file" class="form-control" id="image" name="image">
                                @if($utilisation->image)
                                    <img src="{{ asset('imagess/' . $utilisation->image) }}" alt="Current Image" class="mt-2" style="max-width: 100px;">
                                @endif
                            </div>
                            <button type="submit" class="btn" style="background-color:#db751b; color: #fff;">Mettre à jour</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
