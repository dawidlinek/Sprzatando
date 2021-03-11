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
  <div class="container-fluid">
    <nav class="navbar navbar-expand-lg sticky-top navbar-light bg-light m-4">
      <div class="container-fluid">
        <a class="navbar-brand" href="/">
          <h2 class="text-primary">SprzatnijME! </h2>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
          <ul class="navbar-nav mb-2 mb-lg-0">
            @auth
            <li class="nav-item">
              <a class="nav-link btn-lg" aria-current="page" href="{{ url('/dashboard') }}">Panel</a>
            </li>
            <form method="POST" action="{{ route('logout') }}">
              @csrf
              <li class="nav-item">
                <button class="nav-link btn-lg text-decoration-none bg-transparent border-0" aria-current="page">Wyloguj się</button>
              </li>
            </form>
            @else
            <li class="nav-item">
              <a class="nav-link btn-lg" aria-current="page" href="{{ route('login') }}">Zaloguj się!</a>
            </li>
            <li class="nav-item">
              <a class="nav-link btn-lg" aria-current="page" href="{{ route('register') }}">Rejestracja</a>
            </li>
            @endauth
          </ul>
        </div>
      </div>
    </nav>
    <div class="card">
      <div class="card-header">
        <h2 class="text-center text-primary p-3 m-4">Coming Soon</h2>
        <div class="card-body">
          <h3 class="text-center p-3">Dzięki Tobie tu powstanie nasza strona!</h3>
          <p class="text-center pt-5">Już wkrótce otworzymy nasza stronę jednoczącą wszystkich miłośników sprzątania!</p>
          <p class="text-center">Zapraszamy wktótce! Zachęcamy do rejestracji!</p>
          <p class="text-center mb-5">Jako zalogowany użytkownik masz większe możliwości!</p>
        </div>
      </div>
    </div>
  </div>

  <script src="/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>