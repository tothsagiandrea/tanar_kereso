<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tanárkereső</title>
        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/swiper-bundle.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/style.css')}}">
        @yield('styles')
        <link rel="icon" href="{{asset('img/graduation_cap.svg')}}" type="image/svg+xml">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <script src="{{ asset('js/bootstrap.bundle.min.js') }}" defer></script>
    </head>

    <body>
        <header>
            <img src="img\fejlec.png" class="header-fejlec" style="width: 100%" alt="fejlec">
        </header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <button class="navbar-toggler ml-auto bg-light my-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse navbar-dark my-3" id="navbarNavAltMarkup">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a class="nav-link" href="{{route('indexPage')}}">Tanárkereső</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{route('servicesPage')}}">Információk</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{route('contactsPage')}}">Kapcsolat</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{route('forumPage')}}">Fórum</a></li>
                        @guest
                        <li class="nav-item"><a class="nav-link" href="{{route('loginPage')}}">Bejelentkezés</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{route('registrationPage')}}">Regisztráció</a></li>
                        @endguest
                    </ul>

                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Keresés..." aria-label="Keresés">
                        <button class="btn btn-outline-light" type="submit">Keresés</button>
                    </form>

                    @auth
                    <div class="dropdown">
                        <button class="btn btn-outline-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Profilom
                        </button>
                        <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{route('logoutUser')}}">Kilépés</a></li>
                        <li><a class="dropdown-item" href="{{route('teacherDataPage')}}">Adatok módosítása</a></li>
                        </ul>
                    </div>
                    @endauth
                </div>
            </div>
        </nav>

        <main class="main-container">
            <div class="floating-container">
                @yield('content')
            </div>
        </main>

        <footer class="footer-container">
            <img src="img/logo.jpg" alt="logo" id="logolablec">
            <a href="{{route('gdprPage')}}">Adatvédelmi szabályzat</a>
            <a href="{{route('aszfPage')}}">ÁSZF</a>
            <a href="{{route('contactsPage')}}">Kapcsolat</a>
        </footer>
        <script src="{{asset('js/adatbekero.js')}}"></script>
    </body>
</html>
