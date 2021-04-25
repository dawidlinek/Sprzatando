<header id="header" class="navbar navbar-light sticky-top bg-light flex-nowrap pl-2 pr-2 pt-3 pb-3 shadow w-100 justify-content-start">

    <!-- <Logo & hamburger> -->
    <div class="d-flex justify-content-between col-12 col-md-auto col-lg-2">
        <a class="navbar-brand ml-2 px-3 text-left" href="/">
            <img alt="logo" src="/img/logo.png" height="60" />
            <span class="d-none d-lg-inline">SprzatnijME!</span>
        </a>

        <button class="navbar-toggler border-0 d-md-none collapsed m-2" style="margin-right: 1rem !important" type="button" data-bs-toggle="collapse" data-bs-target="#mobileMenu" aria-controls="sidebarMenu" aria-expanded="false">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
    <!-- </Logo & hamburger> -->


    <!-- <Linki desktop> -->
    <div class="d-none d-md-flex flex-column flex-md-row justify-content-between align-items-center w-100 p-1 ml-3">

        <!-- <Przyciski z lewej> -->
        <div class="d-flex mr-2 col-auto" style="white-space: nowrap">
            <div class="d-flex justify-content-between col-auto" style="white-space: nowrap; padding-left: 0.5rem; padding-right: 0.5rem;">

                <a class=" text-decoration-none m-2 text-left ml-3 mr-3  {{request()->route()->uri=='search' ? 'text-primary' : 'text-dark'}} " href="/search">
                    Przeglądaj
                </a>

                <a class="text-decoration-none m-2 text-right ml-3 mr-3  {{request()->route()->uri=='ranking' ? 'text-primary' : 'text-dark'}}" style="white-space: nowrap" href="/ranking">
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

                <a class="text-dark text-decoration-none m-2 text-right ml-3 mr-3" style="white-space: nowrap" href="/dashboard/announcement">
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

<!-- <Linki mobile> -->
<div class="d-block d-md-none">
    <nav id="mobileMenu" class="w-100 col-md-3 col-lg-2 d-md-block bg-white shadow sidebar collapse" style="z-index: 1000;">
        <div class="position-sticky pt-3">
            <!-- Mobile version main links -->
            <div class="d-block d-md-none">
                <ul class="nav flex-column">
                    <!-- <Main links> -->
                    <li class="nav-item m-1">
                        <a class="nav-link rounded @if(request()->route()->uri=='search') bg-primary text-white @else nav-item-inactive @endif " href="/search">
                            Szukaj
                        </a>
                    </li>
                    <li class="nav-item m-1" >
                        <a class="nav-link rounded @if(request()->route()->uri=='ranking') bg-primary text-white @else nav-item-inactive @endif " href="/ranking">
                            Ranking
                        </a>
                    </li>
                    <!-- </Main links> -->

                    <!-- <Logged> -->
                    @auth
                    <li class="nav-item m-1 nav-item-inactive">
                        <a class="nav-link rounded" href="/dashboard/announcement">
                            Panel użytkownika
                        </a>
                    </li>
                    <li class="nav-item m-1 nav-item-inactive">
                        <form method="POST" action="{{ route('logout') }}" class="d-flex justify-content-start">
                    @csrf
                    <button class="nav-link text-decoration-none text-right bg-transparent border-0 text-nowrap">
                        Wyloguj się
                    </button>
                    </form>
                    </li>
                    @else
                    <!-- </Logged> -->

                    <!-- <Unlogged> -->
                    <li class="nav-item m-1 nav-item-inactive">
                        <a class="nav-link rounded" href="/login">
                            Zaloguj się
                        </a>
                    </li>
                    <li class="nav-item m-1 nav-item-inactive">
                        <a class="nav-link rounded" href="/register">
                            Rejestracja
                        </a>
                    </li>
                    @endauth
                    <!-- </Unlogged> -->
                </ul>
            </div>
        </div>    
    </nav>
</div>
