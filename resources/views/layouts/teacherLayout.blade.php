


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/director.css') }}">
    <script src="{{ asset('js/director.js') }}"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="{{ asset('images/moulay ismai (2).png') }}" type="image/x-icon"/>

    <title>@yield('title')</title>

</head>

<body>

    <div class="containerr">
        <div class="navigation">
            <ul>
                <li>
                    <img src="{{ asset('img/moulayIsmail.png') }}" alt="logo" width="50%" >
                </li>
                <li>
                    <a href="{{ route('teacherDashboard') }}">
                        <span class="icon"><ion-icon name="calendar-outline"></ion-icon></span>
                        <span class="title">Absence</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('displayProfile') }}" id="add-to" class="Add-P-btn">
                        <span class="icon"><ion-icon name="person-outline"></ion-icon></span>
                        <span class="title">Profil</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('accueil') }}" id="add-to" class="Add-P-btn">
                        <span class="icon"><ion-icon name="globe-outline"></ion-icon></span>
                        <span class="title">sitel web </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('logout') }}" id="add-to" class="Add-P-btn">
                        <span class="icon"><ion-icon name="exit-outline"></ion-icon></span>
                        <span class="title">Déconnecte</span>
                    </a>
                </li>
            </ul>
        </div>

        <div class="main">
            <div class="topbar">
                <div class="toggleer" id="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>

                <div class="search">

                </div>
                <div class="user">

                </div>
            </div>

            <div>
                @yield('content')
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
</body>

</html>
