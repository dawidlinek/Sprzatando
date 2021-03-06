<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="stylesheet" href="/css/fonts.css" />
    <link rel="stylesheet" href="/css/dashboard/panel.css" />
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css" />

    <title>Sprzatnij me:D</title>
</head>

<body class="bg-light">
    <header
        class="navbar navbar-light sticky-top bg-light flex-md-nowrap pl-2 pr-2 pt-3 pb-3 shadow w-100 justify-content-start">
        <!-- Logo & hamburger -->
        <div class="d-flex justify-content-between col-12 col-md-3 col-lg-2">
            <a class="navbar-brand ml-2 px-3 text-left" href="#"> logo </a>
            <button class="navbar-toggler d-md-none collapsed m-2" style="margin-right: 1rem !important" type="button"
                data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>

        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center w-100 p-1">
            <!-- Przyciski z lewej -->
            <div class="d-flex mr-2 col-12 col-md-auto" style="white-space: nowrap">
                <div class="d-flex mr-2 col-12 col-md-auto" style="white-space: nowrap">
                    <a class="text-primary text-decoration-none m-2 col-6 col-md-auto text-left" href="#">
                        Panel użytkownika
                    </a>
                    <a class="text-dark text-decoration-none m-2 col-5 col-md-auto text-right"
                        style="white-space: nowrap" href="#">
                        Kontakt
                    </a>
                </div>
            </div>

            <!-- Przyciski z prawej -->
            <div class="d-flex mr-2 col-12 col-md-auto">
                <div class="d-flex mr-2 col-12 col-md-auto" style="white-space: nowrap">
                    <!-- <a
                            class="text-dark text-decoration-none m-2 col-6 col-md-auto text-left"
                            href="#"
                        >
                            Zaloguj się
                        </a> -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                    <button class="text-dark text-decoration-none m-2 col-5 col-md-auto text-right"
                        style="white-space: nowrap; padding-right: 1rem" >
                        Wyloguj się
                    </button>
                        </form>
                </div>
            </div>
        </div>
    </header>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-white sidebar collapse">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="home"></span>
                                Moje ogłoszenia
                            </a>
                        </li>
                        <li class="nav-item m-1">
                            <a class="nav-link bg-primary text-white" href="#">
                                <span data-feather="file"></span>
                                Ustawienia
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

      
@yield('main')
    
    </div>
    </div>

    <script src="/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>