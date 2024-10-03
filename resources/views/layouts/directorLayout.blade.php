
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/director.css') }}">
    <script src="{{ asset('js/director.js') }}"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="{{ asset('images/moulayIsmail.png') }}" type="image/x-icon"/>

    <title>@yield('title')</title>

</head>

<body>

    <div class="containerr">
        <div class="navigation">
            <ul>
                <li>
                    <img src="{{ asset('img/moulayIsmail.png') }}" class="logoo" alt="logo" width="50%" >
                </li>
                <li>

                    @auth
                        @if (auth()->user()->role === 'director')
                            <a href="{{ route('general_guard') }}">
                                <span class="icon"><ion-icon name="people-outline"></ion-icon></span>
                                <span class="title">Responsables</span>
                            </a>
                        @endif
                    @endauth
                </li>
                <li>
                    <a href="{{ route('displayMatieres') }}">
                        <span class="icon"><ion-icon name="book-outline"></ion-icon></span>
                        <span class="title">Matieres</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('showDepartements') }}" id="add-to" class="Add-P-btn">
                        <span class="icon"><ion-icon name="pricetags-outline"></ion-icon></span>
                        <span class="title">Département</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('displayTeachers') }}" id="add-too" class="Add-o-btn">
                        <span class="icon"><ion-icon name="person-add-outline"></ion-icon></span>
                        <span class="title" id="offrr">Les professeurs</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('selectDepartement') }}" id="add-to" class="Add-P-btn">
                        <span class="icon"><ion-icon name="calendar-outline"></ion-icon></span>
                        <span class="title">absence</span>
                    </a>
                </li>


                <li>
                    <a href="{{ route('displayInfo') }}" id="add-to" class="Add-P-btn">
                        <span class="icon"><ion-icon name="person-outline"></ion-icon></span>
                        <span class="title">Profil</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('accueil') }}" id="add-to" class="Add-P-btn">
                        <span class="icon"><ion-icon name="globe-outline"></ion-icon></span>
                        <span class="title">Site web</span>
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
                    <button type="submit" class="btn btn-primary">
                        <a href="{{ url('messages') }}" class="btn btn-link text-white"
                            style="text-decoration: none;">WebSite Dashboard</a>
                    </button>
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
