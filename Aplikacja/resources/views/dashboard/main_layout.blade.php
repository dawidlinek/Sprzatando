<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/css/fonts.css" />
    <link rel="stylesheet" href="/css/app.css" />
    <link rel="stylesheet" href="/css/dashboard/panel.css" />
    <link rel="icon" href="/img/ooda na sto pro.ico">
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

    {{-- <script asynch src="https://maps.google.com/maps/api/js?key=AIzaSyD-Vt-coVq0Nqd2VZc_tEZvvylA36vIO3s&libraries=places" type="text/javascript"></script> --}}

    <title>Sprzatnij me:D</title>
</head>

<body class="bg-light">
    <header class="navbar navbar-light sticky-top bg-light flex-md-nowrap pl-2 pr-2 pt-3 pb-3 shadow w-100 justify-content-start">
        <!-- Logo & hamburger -->
        <div class="d-flex justify-content-between col-12 col-md-3 col-lg-2">
            <a class="navbar-brand ml-2 px-3 text-left" href="/">
                <img alt=" " src="/img/logo.png" height="60" />
                <span class="d-none d-xl-inline">SprzatnijME!</span>
            </a>
            <button class="navbar-toggler border-0 d-md-none collapsed m-2" style="margin-right: 1rem !important" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>

        <div class="d-none d-md-flex flex-column flex-md-row justify-content-between align-items-center w-100 p-1">
            <!-- Przyciski z lewej -->
            <div class="d-flex mr-2 col-auto" style="white-space: nowrap">
                <div class="d-flex justify-content-between col-auto" style="white-space: nowrap; padding-left: 0.5rem; padding-right: 0.5rem;">
                    <a class="text-primary text-decoration-none m-2 col-auto text-left" href="{{route('announcement.index')}}">
                        Panel użytkownika
                    </a>
                    <a class="text-dark text-decoration-none m-2 col-auto text-right" style="white-space: nowrap" href="/ranking">
                        Ranking
                    </a>
                </div>
            </div>

            <!-- Przyciski z prawej -->
            <div class="d-none d-md-flex mr-2 col-12 col-md-auto">
                <div class="d-flex mr-2 col-auto" style="white-space: nowrap">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="text-dark text-decoration-none m-2 col-5 col-auto text-right bg-transparent border-0 text-nowrap" style="padding-right: 1rem">
                            Wyloguj się
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </header>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-white shadow sidebar collapse">
                <div class="position-sticky pt-3">
                    <!-- Mobile version main links -->
                    <div class="d-block d-md-none">
                        <ul class="nav flex-column">
                            <li class="nav-item m-1">
                                <a class="nav-link" href="#" style="font-weight: 700;">
                                    <span data-feather="file"></span>
                                    Panel użytkownika
                                </a>
                            </li>
                            <li class="nav-item m-1">
                                <a class="nav-link rounded" href="#">
                                    <span data-feather="file"></span>
                                    Kontakt
                                </a>
                            </li>
                            <li class="nav-item m-1">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <button class="nav-link text-decoration-none text-right bg-transparent border-0 text-nowrap">
                                        Wyloguj się
                                    </button>
                                </form>
                            </li>
                        </ul>
                        <hr>
                    </div>

                    <!-- Sidebar links -->
          @include('dashboard.menu')
                </div>
            </nav>


            @yield('main')

        </div>
    </div>

    <script src="/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>