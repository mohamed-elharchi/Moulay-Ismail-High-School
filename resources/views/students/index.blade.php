
<div class="card col-sm-12">

    <div class="card-header text-black" style="background-color: #db751b;color:aliceblue;">
        <div class="col-sm-6 p-0 flex justify-content-lg-start justify-content-center">
            <h4 class="ml-lg-4">منقطع عن الدراسة</h4>

        </div>
    </div>


    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom Complet</th>
                        <th>Dernier année scolaire</th>
                        <th>Date de naissance</th>
                        <th>Numéro de Téléphone</th>
                        <th>Statut</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $index => $student)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $student->nom }}</td>
                            <td>{{ $student->scolaire }}</td>
                            <td>{{ $student->date }}</td>
                            <td>{{ $student->téléphone }}</td>
                            <td>
                                @if (strtolower($student->statut) === 'en cours')
                                    <span class="badgee badgee-warning">{{ $student->statut }} </span>
                                    <img class="status-img" src="{{ asset('images/inProgress.png') }}" alt="in progress" width="10%">
                                @else
                                    <span class="badgee badgee-success">{{ $student->statut }} </span>
                                    <img class="status-img" src="{{ asset('images/completed.png') }}" alt="completed" width="10%">

                                @endif
                            </td>
                            <td>
                                <a href="{{ route('students.show', $student->id) }}"
                                    class="btn btn-info btn-sm">Voir</a>
                                <form action="{{ route('students.destroy', $student->id) }}" method="POST"
                                    style="display: inline;">
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
