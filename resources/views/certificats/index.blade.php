@extends('layouts.dashboard1')
@section('title', 'Certificates')

@section('content')

    <div class="container ">
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                <p>{{ session('success') }}</p>
            </div>
        @endif
        <div class="row justify-content-center">

            <div class="card mb-4 col-sm-12">
                <div class="card-header text-black " style="background-color: #db751b; color:aliceblue;">
                    <div class="col-sm-6 p-0 flex justify-content-lg-start justify-content-center">
                        <h4 class="ml-lg-4">تلاميذ الثانويه</h4>

                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nom Complet</th>
                                    <th>Date de Naissance</th>
                                    <th>Code MSSAR</th>
                                    <th>Numéro de Téléphone</th>
                                    <th>Statut</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($certificats as $index => $certificatt)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $certificatt->nom_complet }}</td>
                                        <td>{{ $certificatt->date_naissance }}</td>
                                        <td>{{ $certificatt->code_mssar }}</td>
                                        <td>{{ $certificatt->numero_telephone }}</td>
                                        <td>
                                            @if (strtolower($certificatt->statut) === 'en cours')
                                                <span class="badgee badgee-warning">{{ $certificatt->statut }} </span>
                                                <img class="status-img" src="{{ asset('images/inProgress.png') }}" alt="in progress" width="10%">
                                            @else
                                                <span class="badgee badgee-success">{{ $certificatt->statut }} </span>
                                                <img class="status-img" src="{{ asset('images/completed.png') }}" alt="completed" width="10%">

                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('certificats.show', $certificatt->id) }}"
                                                class="btn btn-info btn-sm">Voir</a>
                                            <form action="{{ route('certificats.destroy', $certificatt->id) }}"
                                                method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce certificat?')">Supprimer</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @include('students.index')

        </div>
    </div>



@endsection
