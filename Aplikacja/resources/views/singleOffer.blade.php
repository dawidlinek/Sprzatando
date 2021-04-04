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
        <title>Sprzatnij me:D</title>
    </head>

<body class="bg-light">

        <div id="bigImage" style="height:100vh; width:100vw; z-index: 99; background:#1c1c678e" class="position-fixed top-0 start-0 d-none align-items-center justify-content-center">
            <div class="position-absolute d-flex align-items-center justify-content-center bg-primary" id="boxBar" onclick="unShowImage()">
               <div class="closeBar" id="bar1"></div>
               <div class="closeBar" id="bar2"></div>
            </div>
            <div class="w-75 h-75  d-flex align-items-center justify-content-center" >
                <img src="" id="showImage" height="100%"/>
            </div>
        </div>
   @include('components.navbar')
    <div class="d-flex col-12 mt-5 justify-content-center">
        <!-- LEWA KOLUMNA -->
        <div class="col-8 d-flex align-items-center justify-content-start flex-column mb-5">
            <div class="card h-100 w-75 p-5 mb-5 ">
                    <div id="carouselExampleDark" class="carousel carousel-dark slide h-100 d-flex  align-items-center justify-content-center"  >
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleDark"  data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            @if($announcement->img2)  <button type="button" data-bs-target="#carouselExampleDark"  data-bs-slide-to="1" aria-label="Slide 2"></button>@endif
                            @if($announcement->img3)  <button type="button" data-bs-target="#carouselExampleDark"  data-bs-slide-to="2" aria-label="Slide 3"></button>@endif
                        </div>
                        <div class="carousel-inner w-75 d-flex align-items-center position-relative" style="height: 50vh;" data-interval="false" data-ride="carousel" data-pause="hover">
                            {{-- @if($announcement->img1) --}}
                            <div class="carousel-item active align-items-center" >
                                <img src="/uploads/{{$announcement->img1}}" class="carouselImg d-block" alt="Głowne zdjęcie oferty" onclick="showImage(this)">
                            </div>
                            {{-- @endif --}}
                            @if($announcement->img2)
                            <div class="carousel-item align-items-center">
                                <img src="/uploads/{{$announcement->img2}}" class="carouselImg d-block w-100 align-bottom" alt="Drugie zdjęcie oferty" onclick="showImage(this)">
                            </div>
                            @endif
                            @if($announcement->img3)
                            <div class="carousel-item align-items-center" >
                                <img src="/uploads/{{$announcement->img3}}" class="carouselImg d-block w-100 " alt="Trzecie zdjęcie oferty" onclick="showImage(this)">
                            </div>
                            @endif
                        </div>
                        <button class="carousel-control-prev" class="bg-dark" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon"  aria-hidden="true"></span>
                            <span class="visually-hidden" >Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
            </div>
            <div class="card w-75 p-5  d-flex flex-row">
                <div class="w-75">
                    <h3 class="text-primary fw-bolder">{{$announcement->title}}</h3>
                    <p>{{$announcement->description}}</p>
                </div>
                <div  class="w-25 d-flex justify-content-end">
                    {{$announcement->price}} zł
                </div>
            </div>
        </div>
        <!-- KONIEC LEWEJ KOLUMNY -->
        <!-- PRAWA KOLUMNA -->
        <div class="col-3 mb-5 h-100">
            <div class="card h-50 w-100 p-5 mb-5 d-flex flex-column">
                    <h3>   {{$announcement->localization}}</h3>
                    <img src="../assets/img/HomeKONCEPT-68-zdjecie-1.jpg" alt="">
            </div>
            <div class="card w-100 p-5 mb-5">
                <form method="POST" action="/engage/{{$announcement->id}}">
                    @csrf
                    <button class="btn btn-primary mb-3 p-4">Zgłoś się do zgłoszenia</button>
                </form>
                <form method="POST" action="/ban/{{$announcement->id}}">
                    @csrf
                    <button class="btn bg-white border border-primary border-4 p-4">Zgłoś ogłoszenie</button> 
                </form>
            </div>
                <div class="d-flex flex-row flex-wrap w-100 h-25 mb-5">
                    @foreach ($announcement->categories as $category)
                        
                    <button class="btn btn-primary m-3 px-5 py-3">{{$category->name}}</button>
                    @endforeach
                 
            </div>
        </div>
        <!-- KONIEC PRAWEJ KOLUMNY -->
    </div>
  </div>
  <div class="toTop bg-primary" onclick="scrollToTop()">
      ↑
  </div>
  <footer class="mt-5">

  </footer>
  <script src="./bootstrap/js/bootstrap.bundle.min.js"></script>
  <script>
      const showBigImage = document.querySelector('#bigImage');
      const headerSection = document.querySelector('#header');
      const imageToShow = document.querySelector('#showImage');
      function scrollToTop(){
          window.scrollTo(0, 0);
      }
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
</body>

</html>