<!DOCTYPE html>
<html lang="pl">

<head>
    @include('components.head')
    <link rel="stylesheet" href="/css/dashboard/panel.css" />
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
</head>

<body class="bg-light">
    <header class="navbar navbar-light sticky-top bg-light flex-md-nowrap pl-2 pr-2 pt-3 pb-3 shadow w-100 justify-content-start">
        <!-- Logo & hamburger -->
        <div class="d-flex justify-content-between col-12 col-md-3 col-lg-2">
            <a class="navbar-brand ml-2 px-3 text-left" href="/">
                <img alt=" " src="/img/logo.png" height="60" />
                <span class="d-none d-xl-inline">SprzatnijME!</span>
            </a>
            <button class="navbar-toggler border-0 d-md-none collapsed m-2" style="margin-right: 1rem !important" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Up" >
                <span class="navbar-toggler-icon" aria-hidden="true"></span>
            </button>
        </div>

        <!-- <Linki desktop> -->
        <div class="d-none d-md-flex flex-column flex-md-row justify-content-between align-items-center w-100 p-1 ml-3">

            <!-- <Przyciski z lewej> -->
            <div class="d-flex mr-2 col-auto" style="white-space: nowrap">
                <div class="d-flex justify-content-between col-auto" style="white-space: nowrap; padding-left: 0.5rem; padding-right: 0.5rem;">

                    <a class="text-dark text-decoration-none m-2 text-left ml-3 mr-3" href="/search">
                        Przeglądaj
                    </a>

                    <a class="text-dark text-decoration-none m-2 text-right ml-3 mr-3" style="white-space: nowrap" href="/ranking">
                        Ranking
                    </a>

                </div>
            </div>
            <!-- </Przyciski z lewej> -->


            <!-- <Przyciski z prawej> -->
            <div class="d-none d-md-flex mr-2 col-12 col-md-auto">
                <div class="d-flex mr-2 col-auto" style="white-space: nowrap">

                    <!-- <Logged> -->
                    @auth

                    <a class="text-dark text-decoration-none m-2 text-right ml-3 mr-3 text-primary" style="white-space: nowrap" href="/dashboard/announcement">
                        Panel użytkownika
                    </a>
                    <form method="POST" action="{{ route('logout') }}" class="ml-3 mr-3">
                        @csrf
                        <button class="text-dark text-decoration-none m-2 col-5 text-right bg-transparent border-0 text-nowrap w-100" style="padding-right: 1rem">
                            Wyloguj się
                        </button>
                    </form>
                    @endauth
                    <!-- </Logged> -->

                    @guest
                    <!-- <Unlogged> -->
                    <a class="text-dark text-decoration-none m-2 col-auto text-right ml-3 mr-3" style="white-space: nowrap" href="/login">
                        Zaloguj się
                    </a>
                    <a class="text-dark text-decoration-none m-2 col-auto text-right ml-3 mr-3" style="white-space: nowrap" href="/register">
                        Rejestracja
                    </a>
                    @endguest
                    <!-- </Unlogged> -->
                </div>
            </div>
            <!-- </Przyciski z prawej> -->

        </div>
        <!-- </Linki desktop> -->
    </header>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-xl-2 d-md-block bg-white shadow sidebar collapse" style="z-index: 1002;">
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
                                <a class="nav-link rounded" href="/ranking">
                                    <span data-feather="file"></span>
                                    Ranking
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
