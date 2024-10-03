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
                                <h4 class="ml-lg-4">Editer la Nouvelle</h4>
                            </div>
                            <div class="col-sm-6 p-0 d-flex justify-content-end">
                            <a href="{{ url('/news') }}" class="btn ]" style="background-color:#db751b;     color: #fff;">
                               <ion-icon name="arrow-undo-outline"></ion-icon>        <span>Retour</span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <form action="{{ route('news.update', $news->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="title">Titre :</label>
                            <input type="text" class="form-control" name="title" id="title" value="{{ $news->title }}">
                        </div>
                        <div class="form-group">
                            <label for="paragraph">Paragraphe :</label>
                            <textarea class="form-control" name="paragraph" id="paragraph" cols="30" rows="10">{{ $news->paragraph }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="photo">Image :</label>
                            <input type="file" name="image" id="image" class="form-control" placeholder="image">
                                                        <img src="/imagess/{{ $news->image }}" alt="Current Image" class="mt-2" style="max-width: 100px;">
                        </div>
                        <button type="submit" class="btn" style="background-color:#db751b; color: #fff;">Mettre à jour</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
