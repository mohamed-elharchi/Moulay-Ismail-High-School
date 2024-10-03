
<!DOCTYPE html>
<html lang="fr">

<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- <link rel="stylesheet" href="{{ asset('css/login.css') }}"> --}}
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <header>
        <nav id="main-nav" class="navbar navbar-expand-lg navbar-light bg-secondary">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('images/logo.png') }}" alt="Example" height="50"> <!-- Increased height -->
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link font-weight-bold mt-2" href="{{ route('accueil') }}">Accueil</a>
                    </li>
                    @auth
                        <a class="nav-link" href="{{ route('logout') }}">
                            <button class="btn font-weight-bold btn-outline-danger">Déconnecte</button>
                        </a>
                    @endauth
                    @guest

                        <a class="nav-link" href="{{ route('login') }}">
                            <button class="btn font-weight-bold btn-outline-success">Se connecter</button>
                        </a>

                    @endguest

                </ul>
            </div>
        </nav>



    </header>


    <div class="container mt-5">
        @yield('content')
    </div>




    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


</body>

</html>
