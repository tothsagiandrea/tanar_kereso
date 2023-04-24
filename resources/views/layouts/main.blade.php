<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
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
            <img src="img\fejlec.png" class="header-fejlec" alt="fejlec">
        </header>
        <div class="main-container">
            <div class="header-container">
                <img src="img\hatter.png" class="header-image" alt="fokep">
            </div>
            <div class="floating-container">
                <div class="navigation-container">
                    <nav class="container-fluid navbar navbar-expand-lg navbar-light bg-light">
                        <button class="navbar-toggler ml-auto bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse navbar-dark" id="navbarNavAltMarkup">
                            <div class="navbar-nav">
                                <a class="nav-link" href="{{route('indexPage')}}">Tanárkereső</a>
                                <a class="nav-link" href="{{route('servicesPage')}}">Információk</a>
                                <a class="nav-link" href="{{route('contactsPage')}}">Kapcsolat</a>
                                <a class="nav-link" href="{{route('forumPage')}}">Fórum</a>
                                @guest
                                <a class="nav-link" href="{{route('loginPage')}}">Bejelentkezés</a>
                                <a class="nav-link" href="{{route('registrationPage')}}">Regisztráció</a>
                                @endguest
                            </div>
                        </div>
                        <form class="d-flex" role="search">
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
                    </nav>
                </div>
                <div class="content-container">
                    @yield('content')
                </div>
            </div>
            <footer class="footer-container">
                <img src="img/logo.jpg" alt="logo" id="logolablec">
                <span class="material-icons icons">phone</span>
                <a href="{{route('gdprPage')}}">Adatvédelmi szabályzat</a>
                <a href="{{route('aszfPage')}}">ÁSZF</a>
                <a href="{{route('contactsPage')}}">Kapcsolat</a>

            </footer>
        </div>
        <script src="{{asset('js/adatbekero.js')}}"></script>
    </body>
</html>
