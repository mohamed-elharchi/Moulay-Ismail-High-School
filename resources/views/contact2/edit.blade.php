@extends('layouts.dashboard1')

@section('content')
    <div class="container">
        <h1>Edit Contact</h1>
        <form method="POST" action="{{ route('contacts.update', ['contact' => $contact->id]) }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="telephon1">Téléphone 1:</label>
                <input type="text" id="telephon1" name="telephon1" value="{{ $contact->telephon1 }}" class="form-control">
            </div>

            <div class="form-group">
                <label for="telephon2">Téléphone 2:</label>
                <input type="text" id="telephon2" name="telephon2" value="{{ $contact->telephon2 }}" class="form-control">
            </div>

            <div class="form-group">
                <label for="email1">Email 1:</label>
                <input type="text" id="email1" name="email1" value="{{ $contact->email1 }}" class="form-control">
            </div>

            <div class="form-group">
                <label for="email2">Email 2:</label>
                <input type="text" id="email2" name="email2" value="{{ $contact->email2 }}" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Update Contact</button>
        </form>
    </div>
@endsection
