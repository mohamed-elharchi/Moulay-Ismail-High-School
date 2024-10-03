<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/director.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="{{ asset('images/moulayIsmail.png') }}" type="image/x-icon"/>
    <title>@yield('title')</title>
</head>

<body class="bod">

    <div class="containerr">
        <div class="navigation">
            <ul>
                <li>
                    <img src="{{ asset('img/logo.png') }}" alt="" width="70%" height="70%">
                </li>
                <li>
    <a href="{{ url('/messages') }}">
        <span class="icon"><ion-icon name="mail-unread-outline"></ion-icon></span>
        <span class="title"> Message</span>
        <div class="notification-container">
            <div class="bell-icon">
                @if(isset($messages) && $messages->count() > 0)
                    <span class="badge">{{ $messages->count() }}</span>
                @endif
            </div>
        </div>
    </a>
</li>
                    <li>
                    <a href="{{ url('/certificats') }}">
                        <span class="icon"><ion-icon name="document-outline"></ion-icon></span>
                        <span class="title">certificats</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/contacts') }}">
                        <span class="icon"><ion-icon name="phone-portrait-outline"></ion-icon></span>
                        <span class="title">contact</span>
                    </a>
                </li>


                <li>

                    <a href="{{ url('/news') }}">
                        <span class="icon"><ion-icon name="newspaper-outline"></ion-icon></span>
                        <span class="title">Nouvelles</span>
                    </a>
                </li>

                <li>
                    <a href="{{ url('/utilisations') }}">
                        <span class="icon"><ion-icon name="calendar-outline"></ion-icon></span>
                        <span class="title">L'emploi de tempss</span>
                    </a>
                </li>


                <li>
                    <a href="{{ route('accueil') }}">
                        <span class="icon"><ion-icon name="globe-outline"></ion-icon></span>
                        <span class="title"> site web</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('logout') }}">
                        <span class="icon"><ion-icon name="log-out-outline"></ion-icon></span>
                        <span class="title">Sign out</span>
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
                    <a href="{{ route('general_guard') }}" class="btn btn-primary text-white" style="text-decoration: none;">Dashboard</a>
                </div>
            </div>

            <div class="content">
                @yield('content')
            </div>
        </div>
    </div>


    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/director.js') }}"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
</body>

</html>
