<!DOCTYPE html>
<html lang="pl">

  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="/css/fonts.css" />
    <link rel="stylesheet" href="/css/dashboard/panel.css" />
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css" />
   
    <link rel="icon" href="/img/ooda na sto pro.ico">
    <title>Sprzatnij me:D</title>
  </head>
<body class="bg-light">
  
  <div class="container-fluid">
    <nav class="navbar navbar-expand-lg sticky-top navbar-light bg-light m-4">
      <div class="container-fluid">
        <a class="navbar-brand" href="/">
          <h2 class="text-primary">SprzatnijME!
          </h2>
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
    
    <div class="row d-none d-md-block">
      <div class="img-fluid position-relative col-12"
        style="background-image: url(/img/pexels-becosan-3681787.jpg); background-size: cover; min-height: 50vh;  filter: brightness(70%);">
      </div>
    </div>
    <div class="input-group position-absolute d-flex justify-content-center align-items-center d-none d-md-flex"
      style="top: 0; left: 0; min-height: 50vh;">
      <div class="form-outline col-5">
        <span id="this_little_thing"
          style="position: absolute; background-color: #1c1c67; display: block; min-height: 5vh;">&nbsp</span>
        <input type="search" id="form1" class="form-control" placeholder="Wyszukaj ofertę..."
          style="min-height: 5vh; max-height: 5vh; z-index: 100; background-color: white;" />
      </div>
      <button type="button" class="btn btn-primary" onclick="window.location='/search?name='+form1.value" style="min-height: 5vh; max-height: 5vh; ">
        <p class="fas fa-search">Szukaj</p>
      </button>
    </div>
    <!-- Male -->
    <div class="row d-sm-block d-md-none">
      <div class="img-fluid position-relative col-12"
        style="background-image: url(../_design/pexels-becosan-3681787.jpg); background-size: cover; min-height: 25vh;  filter: brightness(70%);">
      </div>
    </div>
    <div class="input-group position-absolute d-flex justify-content-center align-items-center d-sm-block d-md-none"
      style="top: 0; left: 0; min-height: 25vh;">
      <div class="form-outline col-8">
        <span id="this_little_thing"
          style="position: absolute; background-color: #1c1c67; display: block; min-height: 5vh;">&nbsp</span>
        <input type="search" id="form1" class="form-control" placeholder="Wyszukaj ofertę..."
          style="min-height: 5vh; max-height: 5vh; z-index: 100; background-color: white;" />
      </div>
      <button type="button" class="btn btn-primary" style="min-height: 5vh; max-height: 5vh;">
        <p class="fas fa-search">Szukaj</p>
      </button>
    </div>

    <div class="row d-none d-md-block">
      <h2 class="text-primary text-center mt-5 p-3">Wybierz zlecenia tylko z kategorii, które Cię interesują!</h2>
      <form class="btn-group justify-content-between">
        <button class="btn col-3 m-3 text-nowrap btn-primary border-light btn-block btn-lg rounded">Mycie okien</button>
        <button class="btn col-3 m-3 btn-primary border-light btn-block btn-lg rounded">Zamiatanie</button>
        <button class="btn col-3 m-3 btn-primary border-light btn-block btn-lg rounded">Auto</button>
        <button class="btn col-3 m-3 btn-outline-primary btn-block btn-lg rounded">Więcej...</button>
      </form>
    </div>
    <div class="d-sm-block d-md-none text-center">
      <h2 for="category_id col-offset" class="m-4 text-primary text-center">Wybierz zlecenia tylko
        z kategorii, które Cię interesują!</h2>
      <form class="btn-group-vertical w-75 text-center">
        <button class="btn col-3 m-1  text-nowrap btn-primary border-light btn-block btn-sm rounded">Mycie
          okien</button>
        <button class="btn col-3 m-1 btn-primary border-light btn-block btn-sm rounded">Zamiatanie</button>
        <button class="btn col-3 m-1 btn-primary border-light btn-block btn-sm rounded">Auto</button>
        <button class="btn col-3 m-1 btn-outline-primary btn-block btn-sm rounded">Więcej...</button>
      </form>
    </div>

    <div class="row position-relative mt-5">
      <div class="card w-100">
        <div class="card-body d-flex flex-column align-items-start justify-content-between">
          <div class="cart-title col-12">
            <h2 class="text-primary text-center mt-4 mb-4">Ostatnio dodane ogłoszenia:</h2>
          </div>
          <!-- POJEDYNCZE OGŁOSZENIE -->
@foreach ($announcements as $announcement)
@include('components.announcement')
{{-- <div class="row w-100 mx-auto" style="z-index: 100">
  <div class="col-md-2"
  style="background-image: url(/uploads/{{$announcement->img1??"placeholder.jpg"}}); background-position: center center; background-size: cover; min-height: 180px;">
  &nbsp;
</div>
<div class="col-md-8 col-sm-8">
  <div class="card-body">
                <div class="row col-12">
                  <div class="col-lg-6">
                    <h5 class="card-title text-primary text-nowrap">{{$announcement->title}}</h5>
                  </div>
                  <div class="col-lg-4">
                    <p class="row card-text nowrap d-sm-flex"><small
                        class="col-md-4 text-muted d-flex justify-content-start">{{$announcement->price}} zł</small><small
                        class=" col-md-4text-muted d-md-none justify-content-start">{{$announcement->localization}}</small>
                    </p>
                  </div>
                </div>
                <div class="w-100">
                  <p class="card-text">
                      <span class="badge {{$announcement->status}} rounded">{{__($announcement->status)}}</span>
                  </p>
              </div>
                <p class="card-text">{{$announcement->description}} </p>
              </div>
            </div>
            <div class="col-md-2 p-4">
              <div class="b-row d-md-block d-none">
                <p><small class="text-muted overflow-wrap">{{$announcement->localization}}</small></p>
              </div>
              <div class="b-row d-flex align-text-center p-3">
                <button class="btn btn-primary w-100 text-nowrap">Pokaż</button>
              </div>
            </div>
          </div>
           --}}
          @endforeach
          <!-- POJEDYNCZE OGŁOSZENIE END -->
        </div>
      </div>

    </div>
    <div class="row">
            <div class="position-relative
       p-0 m-0" style="z-index: 100; background-color: #15192F;">
        &nbsp;
        <div class="position-absolute d-block m-0 p-0" style="height: 50vh;">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 2023.356 825.819">
            <path id="Path_24" data-name="Path 24"
              d="M-446.3,317.207s10.768,320.258,857.508,257.938,1120.265-202.512,1107.238-50.964-8.707,593.705-26.076,602.2-1996.839,8.321-1996.839,8.321V308.887Z"
              transform="translate(504.469 -308.887)" fill="#e6f2ff" />
          </svg>
        </div>
      </div>
    </div>
  </div>



  <script src="./bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>