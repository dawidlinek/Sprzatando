<nav class="navbar navbar-light pb-3">
    <a class="navbar-brand" href="#">
        <img src="" width="50" height="50" alt="LOGO" />
    </a>
    <div class="d-flex justify-content-end">
        <ul class="navbar-nav flex-row">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">
                    <span class="sr-only @if($route=='login')  text-primary d-none d-lg-block @endif">Zaloguj się!</span>
                </a>
            </li>
            <li class="nav-item">
                <a style="margin-left: 3rem" class="nav-link @if($route=='register') d-none d-lg-block text-primary @endif" href="{{ route('register') }}">Rejestracja</a>
            </li>
        </ul>
    </div>
</nav>