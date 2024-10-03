@extends('layouts.directorLayout')
@section('title')
    select departements
@endsection
@section('content')
    <?php
    $today = new DateTime();
    $mondays = [];

    $currentDate = clone $today;
    while ($currentDate->format('N') != 1) {
        $currentDate->modify('-1 day');
    }

    $daysCount = 0;
    while ($daysCount < 8) {
        $mondays[] = clone $currentDate;
        $currentDate->modify('-7 days');
        $daysCount++;
    }
    ?>

    <!-- Your HTML code here -->


    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">l'absence des classes:</h2>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger" role="alert">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('showweekAbsence') }}" method="GET">
                            @csrf
                            <div class="form-group">
                                <label for="departement">Selectionner une classe:</label>
                                <select name="departement" id="departement" class="form-control">
                                    <option value="" disabled selected>departement name</option>
                                    @foreach ($departements as $departement)
                                        <option value="{{ $departement->id }}">{{ $departement->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="from_date">A partir de la date:</label>
                                <select name="from_date" id="from_date" class="form-control">
                                    @foreach ($mondays as $monday)
                                        <option value="{{ $monday->format('Y-m-d') }}">{{ $monday->format('l, F j, Y') }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="to_date">Jusqu'à la date:</label>
                                <input type="date" name="to_date" id="to_date" class="form-control" readonly>
                            </div>
                            <!-- Hidden inputs to pass selected department name and dates -->
                            <input type="hidden" name="department_name" id="department_name">
                            <input type="hidden" name="from_date_display" id="from_date_display">
                            <input type="hidden" name="to_date_display" id="to_date_display">

                            <button type="submit" class="btn btn-primary">Confirmer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function setToDate() {
            var fromDate = new Date(document.getElementById("from_date").value);
            var toDate = new Date(fromDate);
            toDate.setDate(toDate.getDate() + 5); // Add 5 days to get to Saturday
            document.getElementById("to_date").value = toDate.toISOString().split('T')[0];
        }

        setToDate();

        document.getElementById('from_date').addEventListener('change', setToDate);

        document.querySelector('form').addEventListener('submit', function () {
            var departmentSelect = document.getElementById('departement');
            var departmentName = departmentSelect.options[departmentSelect.selectedIndex].text;
            var fromDateDisplay = document.getElementById('from_date').options[document.getElementById('from_date').selectedIndex].text;
            var toDateDisplay = document.getElementById('to_date').value;

            document.getElementById('department_name').value = departmentName;
            document.getElementById('from_date_display').value = fromDateDisplay;
            document.getElementById('to_date_display').value = toDateDisplay;
        });
    </script>


@endsection
