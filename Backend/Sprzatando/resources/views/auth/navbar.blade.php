<nav class="navbar navbar-light pb-3">
    <a class="navbar-brand" href="#">
        <img src="" width="50" height="50" alt="LOGO" />
    </a>
    <div class="d-flex justify-content-end">
        <ul class="navbar-nav flex-row">
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('login') }}">
                    <span
                    class="sr-only d-none d-lg-block   @if($route=='login')  text-primary @endif" 
                        style="margin-right: 3rem"
                        >Zaloguj się!</span
                    >
                </a>
            </li>
            <li class="nav-item">
             <a class="nav-link" href="{{ route('register') }}"> <span @if($route=='register')  class="text-primary" @endif> Rejestracja </span></a>  
            </li>
        </ul>
    </div>
</nav>