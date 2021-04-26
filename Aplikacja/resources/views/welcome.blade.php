<!DOCTYPE html>
<html lang="pl">

<head>
  @include('components.head')
</head>

<body class="bg-light">

  @include('components.navbar')

  <div class="container-fluid">

    <!-- <Search row> -->
    <form method="POST" action="/search">
      <div class="row d-grid place-items-center welcome-image-background" style="place-items: center;">
        <div class="col-12 col-md-8 col-xl-6 d-flex">

          <!-- Input wrapped in div to let css ::before pseudoclass to be active -->
          <div class="w-100 input-before-style">
            @csrf
            <input type="search" id='search' class="form-control" name='name' placeholder="Np. sprzątanie biura..." style="height: 6vh; border-radius: .25rem 0 0 .25rem" />
          </div>

          <button type="submit" class="btn btn-primary d-flex align-items-center justify-content-center" style="height: 6vh; padding: 0 20px; border-radius: 0 .25rem .25rem 0">
            <x-feathericon-search class="text-white" style="margin-right: 6px;" /> Szukaj
          </button>

        </div>
      </div>
    </form>
    <!-- </Search row> -->


    <!-- <Categories> -->
    <div class="row d-flex flex-column align-items-center">

      <h2 class="text-primary text-center mb-5 p-2" style="font-weight: 700; margin-top: 2.5rem;">
        Wybierz zlecenia tylko z kategorii, <br> które Cię interesują!
      </h2>

      <div class="btn-group justify-content-between align-items-center welcome-width-fluid flex-column flex-md-row">

        @foreach ($categories as $category)
        <form class="w-100 m-3" method="POST" action="/search">
          @csrf
          <input hidden name='category' value="{{$category->name}}" />
          <button class="btn btn-block col-3 btn-primary border-light btn-block btn-lg rounded">{{$category->name}}</button>
        </form>
        @endforeach

        <a class="btn col-3 m-3 btn-outline-primary btn-block btn-lg rounded" href="/search">Więcej...</a>

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
      <path fill="#e6f2ff" d="m-1.90456,69.4965s72.01802,260.25798 918.75802,197.93798s1120.265,-202.512 1107.238,-50.964s-8.707,593.705 -26.076,602.2s-1996.839,8.321 -1996.839,8.321l-3.08102,-757.49498zl3.08102,-68.32002" id="Path_24"/>
      </svg>
      <!-- </Wave> -->
    </div>
    <!-- </Ostatnio dodane ogłoszenia> -->


    <!-- <Footer -->
    @include('components.footer')
    <!-- </Footer> -->

  </div>
  <script src="/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>