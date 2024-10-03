@extends('layouts.dashboard1')

@section('content')
@section('title', 'Contact')

    <div class="container">
        <h1>Liste des contacts</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Téléphone 1</th>
                    <th>Téléphone 2</th>
                    <th>Email 1</th>
                    <th>Email 2</th>
                    <th>Action</th> <!-- New column for the Edit button -->
                </tr>
            </thead>
            <tbody>
                @foreach($contacts as $contact)
                    <tr>
                        <td>{{ $contact->telephon1 }}</td>
                        <td>{{ $contact->telephon2 }}</td>
                        <td>{{ $contact->email1 }}</td>
                        <td>{{ $contact->email2 }}</td>
                        <td>
                            <a href="{{ route('contacts.edit', ['contact' => $contact->id]) }}" class="btn btn-primary">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
