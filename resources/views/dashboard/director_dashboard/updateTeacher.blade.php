@extends('layouts.directorLayout')
@section('title')
    Modifier
@endsection
@section('content')
<div class="container mt-4">
    <div class="row justify-content-center mt-4">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> <h4>Modifier les informations de professeur {{ $teacherNmae }}</h4></div>

                <div class="card-body">
                    <form method="post" action="{{ route('saveUpdateTeacher', $teacher->id) }}">
                        @method('PATCH')
                        @csrf


                        <div class="form-group">
                            <label for="matiere">Matière:</label>
                            <select class="form-control" id="matiere" name="matiere_id">
                                @foreach($matieres as $matiere)
                                    <option value="{{ $matiere->id }}" @if($teacher->matiere_id == $matiere->id) selected @endif>{{ $matiere->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="departments">Départements:</label>
                            <select class="form-control" id="departments" name="department_ids[]" multiple>
                                @foreach($departments as $department)
                                    <option value="{{ $department->id }}" @if(in_array($department->id, $teacher->departments->pluck('id')->toArray())) selected @endif>{{ $department->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
