@extends('layouts.directorLayout')
@section('title')
    Les professeurs
@endsection
@section('content')

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

<div class="container mt-4">
    <div class="row justify-content-between mb-3">
        <div class="col-lg-2">
            <a class="btn btn-success" href="{{ route('addTeacher') }}">Ajouter</a>
        </div>
    </div>

    <table class="table table-bordered">
        <tr>
            <th>Numéro</th>
            <th>Nom</th>
            <th>Matières</th>
            <th>Départements</th>
            <th>Action</th> 
        </tr>
        @forelse ($teachers as $index => $teacher)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $teacher->admin->name }}</td>
                <td>{{ $teacher->matiere->name }}</td>
                <td>
                    @foreach ($teacher->departments as $department)
                        {{ $department->name }}<span> -- </span>
                    @endforeach
                </td>
                <td>
                    <form action="{{ route('deleteTeacher', $teacher->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <a class="btn btn-primary" href="{{ route('updateTeacher', $teacher->id) }}">Modifier</a>
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="5">Aucun professeur trouvé</td></tr>
        @endforelse
    </table>
    <div class=" justify-content-center">
        {{ $teachers->links() }}
    </div>
</div>

@endsection
