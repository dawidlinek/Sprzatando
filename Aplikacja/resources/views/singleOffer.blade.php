<!DOCTYPE html>
<html lang="pl">

<head>
    @include('components.head')

    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>


</head>

<body class="bg-light">

    <div id="bigImage" style="height:100vh; width:100vw; z-index: 9999; background:#1c1c678e" class="position-fixed top-0 start-0 d-none align-items-center justify-content-center">
        <div class="position-absolute d-flex align-items-center justify-content-center bg-primary" id="boxBar" onclick="unShowImage()">
            <div class="closeBar" id="bar1"></div>
            <div class="closeBar" id="bar2"></div>
        </div>
        <div class="w-75 h-75  d-flex align-items-center justify-content-center">
            <img src="" id="showImage" height="100%" />
        </div>
    </div>
    @include('components.navbar')
    @include('components.info')
    <div class="row m-1 mt-5 m-md-5 justify-content-center">
        <!-- LEWA KOLUMNA -->
        <div class="col-md-8 col-sm-12 d-flex align-items-center justify-content-start flex-column mb-3 mb-md-5">
            @if($announcement->img1)
            <div class="card h-100 w-100 p-3 p-md-4 mb-3 mb-md-5">
                <div id="carouselExampleDark" class="carousel carousel-dark slide h-100 d-flex  align-items-center justify-content-center">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        @if($announcement->img2) <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>@endif
                        @if($announcement->img3) <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>@endif
                    </div>
                    <div class="carousel-inner w-75 d-flex align-items-center position-relative" style="height: 50vh;" data-interval="false" data-ride="carousel" data-pause="hover">
                        <div class="carousel-item active align-items-center">
                            <img src="/uploads/{{$announcement->img1}}" class="carouselImg d-block w-100" alt="Głowne zdjęcie oferty" onclick="showImage(this)">
                        </div>
                        @if($announcement->img2)
                        <div class="carousel-item align-items-center">
                            <img src="/uploads/{{$announcement->img2}}" class="carouselImg d-block w-100 align-bottom" alt="Drugie zdjęcie oferty" onclick="showImage(this)">
                        </div>
                        @endif
                        @if($announcement->img3)
                        <div class="carousel-item align-items-center">
                            <img src="/uploads/{{$announcement->img3}}" class="carouselImg d-block w-100 " alt="Trzecie zdjęcie oferty" onclick="showImage(this)">
                        </div>
                        @endif
                    </div>
                    <button class="carousel-control-prev" class="bg-dark" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            @endif
            <div class="card w-100 p-3 p-md-4 d-flex flex-row">
                <div class="w-100 w-md-75">
                    <div>
                        <div class="col-12 d-flex flex-column flex-md-row">
                            <div class="w-100 d-flex justify-content-between">
                                <h5 class="card-main-title card-title text-primary">
                                    {{$announcement->title}}
                                </h5>
                                <h5 class="m-0 text-nowrap text-primary d-block card-main-price" style="padding-left: 1rem;">
                                    {{number_format($announcement->price, 2, ",", " ")}} zł
                                </h5>
                            </div>
                        </div>
                    </div>

                    <div class='mb-2'>
                        @foreach ($announcement->categories as $category)
                        <span class="badge primary rounded">{{$category->name}}</span>
                        @endforeach
                    </div>

                    <p>{{$announcement->description}}</p>
                </div>
            </div>
        </div>
        <!-- KONIEC LEWEJ KOLUMNY -->

        <!-- PRAWA KOLUMNA -->
        <div class="col-md-4 col-sm-12 mb-1 mb-md-5 h-100">
            <div class="card h-50 w-100 p-3 p-md-4 mb-3 mb-md-5 d-flex flex-column">
                <h3> {{$announcement->localization}}</h3>
                <div id="miniMap"></div>
            </div>
            <div class="card w-100 p-3 p-md-4 mb-3 mb-md-5">

                @auth
                <!-- <Zalogowany> -->
                <div class="row match-height">
                    <form class="col-12 col-xl-6" method="POST" action="/engage/{{$announcement->id}}">
                        @csrf
                        <button class="btn btn-primary mb-3 border-primary border-4 p-2 w-100">Aplikuj</button>
                    </form>
                    <form class="col-12 col-xl-6" method="POST" action="/report/{{$announcement->id}}">
                        @csrf
                        <button class="btn btn-outline-primary border border-primary mb-3 border-4 p-2 w-100">Zgłoś</button>
                    </form>
                </div>
                <!-- </Zalogowany> -->

                <!-- <Admin> -->
                @if(auth()->user()->admin())
                <form method="POST" action="/ban/{{$announcement->id}}">
                    @csrf
                    <button class="btn btn-outline-danger border-danger border-4 p-2 w-100">Zbanuj</button>
                </form>
                @endif
                <!-- </Admin> -->

                @endauth

                <!-- <Niezalogowany> -->
                @guest
                <p>Aby móc się korzystać z pełni możliwośći, musisz być zalogowany!</p>
                <a class="btn btn-primary mb-3 p-2 w-100" href='/login?redirect={{$announcement->id}}'>Zaloguj się</a>
                <a class="btn bg-white border border-primary border-4 p-2 w-100" href='/register'>Zarejestruj się</a>
                @endguest
                <!-- </Niezalogowany> -->
            </div>
        </div>
    </div>
    <!-- KONIEC PRAWEJ KOLUMNY -->

    @include('components.footer')
    <script src="/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script>
      const showBigImage = document.querySelector('#bigImage');
      const headerSection = document.querySelector('#header');
      const imageToShow = document.querySelector('#showImage');
      function showImage(e){
        document.body.style.overflow = "hidden"
        header.style.display = 'none'
        showBigImage.classList.remove('d-none')
        showBigImage.classList.add('d-flex')
        imageToShow.src = e.src
      }
      function unShowImage(){
        document.body.style.overflowY = "scroll"
        header.style.display = 'flex'
        showBigImage.classList.add('d-none')
        showBigImage.classList.remove('d-flex')
      }
  </script>
  <script>
      let map;

function initMap() {
  map = new google.maps.Map(document.getElementById("miniMap"), {
    center: { lat: {{$announcement->latitude}}, lng: {{$announcement->longitude}} },
    zoom: 14,
    disableDefaultUI: true,
    fullscreenControl: true
  });
  var marker = new google.maps.Marker({
  map: map,
  position: new google.maps.LatLng({{$announcement->latitude}}, {{$announcement->longitude}}),
  title: "{{$announcement->localization}}"
});
var circle = new google.maps.Circle({
  map: map,
  radius: 500,    // 10 miles in metres
  fillColor: '#1c1c67',
  strokeOpacity: 0.4,
  fillOpacity: 0.3,
  strokeColor: "#1c1c67",
  strokeWeight: 1,
});
circle.bindTo('center', marker, 'position');
}
  </script>
  <style>
      #miniMap{
          width: 100%;
          min-height: 200px;
          position: block !important;
      }
  </style>
      <script src="https://maps.google.com/maps/api/js?key=AIzaSyD-Vt-coVq0Nqd2VZc_tEZvvylA36vIO3s&callback=initMap" type="text/javascript"></script>

</body>

</html>