<!DOCTYPE html>
<html lang="pl">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css" />
  <link rel="stylesheet" href="/css/fonts.css" />
  <link rel="stylesheet" href="/css/app.css" />
  <link rel="stylesheet" href="/css/welcome.css" />

  <link rel="icon" href="/img/ooda na sto pro.ico">
  <title>Sprzatnij me:D</title>

</head>

<body class="bg-light">

  @include('components.navbar')

  <div class="container-fluid">

    <!-- <Search row> -->
    <div class="row d-grid place-items-center welcome-image-background" style="place-items: center;">
      <div class="col-12 col-md-8 col-xl-6 d-flex">

        <!-- Input wrapped in div to let css ::before pseudoclass to be active -->
        <div class="w-100 input-before-style">
          <input type="search" id='search' class="form-control" placeholder="Np. sprzątanie biura..." style="height: 6vh; border-radius: .25rem 0 0 .25rem" />
        </div>

        <button type="button" class="btn btn-primary d-flex align-items-center justify-content-center" onclick="window.location='/search?name='+search.value" style="height: 6vh; padding: 0 20px; border-radius: 0 .25rem .25rem 0">
          <x-feathericon-search class="text-white" style="margin-right: 6px;" /> Szukaj
        </button>

      </div>
    </div>
    <!-- </Search row> -->


    <!-- <Categories> -->
    <div class="row d-flex flex-column align-items-center">

      <h2 class="text-primary text-center mb-5 p-2" style="font-weight: 700; margin-top: 2.5rem;">
        Wybierz zlecenia tylko z kategorii, <br> które Cię interesują!
      </h2>

      <div class="btn-group justify-content-between align-items-center welcome-width-fluid flex-column flex-md-row">

        @foreach ($categories as $category)
        <button class="btn col-3 m-3 btn-primary border-light btn-block btn-lg rounded" onclick="window.location='/search?category={{$category->name}}'">{{$category->name}}</button>
        @endforeach

        <button class="btn col-3 m-3 btn-outline-primary btn-block btn-lg rounded" onclick="window.location='/search'">Więcej...</button>

      </div>
    </div>
    <!-- </Categories> -->


    <!-- <Ostatnio dodane ogłoszenia> -->
    <div class="row position-relative mt-5 mb-5 p-3 bg-white d-flex flex-column justify-content-center align-items-center">

      <div class="col-12">
        <h2 class="text-primary text-center mb-5 p-2" style="font-weight: 700; margin-top: 2.5rem;">
          Ostatnio dodane ogłoszenia:
        </h2>
      </div>

      <div class="col-12 col-md-11 col-lg-10 col-xl-9">
        @foreach ($announcements as $announcement)
        @include('components.announcement')
        @endforeach
      </div>

      <!-- <Wave> -->
      <svg class="welcome-wave position-absolute" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 2023.356 825.819">
        <path id="Path_24" data-name="Path 24" d="M-446.3,317.207s10.768,320.258,857.508,257.938,1120.265-202.512,1107.238-50.964-8.707,593.705-26.076,602.2-1996.839,8.321-1996.839,8.321V308.887Z" transform="translate(504.469 -308.887)" fill="#e6f2ff" />
      </svg>
      <!-- </Wave> -->
    </div>
    <!-- </Ostatnio dodane ogłoszenia> -->


    <!-- <Footer -->
    <div class="row">
      <div class="p-3" style="background-color: #15192F; min-height: 200px; z-index: 1000;">

      </div>
    </div>
    <!-- </Footer> -->


  </div>
  <script src="./bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>