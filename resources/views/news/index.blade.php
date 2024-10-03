@extends('layouts.dashboard1')

@section('content')
@section('title', 'News')


<div class="container">

    <div class="main-content">
        <div class="row">
            <div class="col-md-12">
                <div class="table-wrapper">

                    <div class="table-title">
                        <div class="row">
                            <div class="col-sm-6 p-0 flex justify-content-lg-start justify-content-center">
                                <h4 class="ml-lg-4">Gérer la Liste Des Nouvelles</h4>
                            </div>
                            <div class="col-sm-6 p-0 d-flex justify-content-end">
                                <a href="{{ route('news.create') }}" class="btn " style="background-color: #db751b; color: #fff;">
                                    <ion-icon name="add-outline"></ion-icon>
                                    <span>Ajouter des nouvelles</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Image</th>
                                <th scope="col">Titre</th>
                                <th scope="col">Paragraphe</th>
                                <th scope="col">Date de création</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($newsList as $news)
                            <tr>
                                <td><img src="{{ asset('imagess/' . $news->image) }}" width="100" height="100"></td>
                                <td>{{ $news->title }}</td>
                                <td>{{ $news->paragraph }}</td>
                                <td>{{ \Carbon\Carbon::parse($news->created_at)->format('d M Y') }}</td>
                                <td>
                                    <a href="{{ route('news.edit', $news->id) }}" class="btn btn-sm btn-primary">Editer</a>
                                    <form action="{{ route('news.destroy', $news->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Supprimer</button>
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
