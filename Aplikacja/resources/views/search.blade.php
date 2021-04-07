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

    @include('components.navbar')

    <div class="d-flex col-12 mt-5">

        <!-- LEWA KOLUMNA -->
        <div id="filtry" class="d-md-flex collapse col-12 col-md-4 mt-0 mt-md-5 flex-column align-items-center">


            <div class="d-flex flex-column align-items-center">

                <div class="col-10 mb-5 d-block d-md-none">
                    <button type="button" data-bs-toggle="collapse" data-bs-target="#filtry" aria-expanded="false" class="d-block d-md-none btn-block btn button-off text-nowrap mt-3 px-4 py-2" href="#">
                        Przeglądaj oferty
                    </button>
                </div>

                <!-- CENA -->
                <div class="col-10 col-md-8 mb-5">

                    <label class="col-8">
                        <h3 class="mb-3">Cena:</h3>
                    </label>

                    <div class="d-flex w-100 justify-content-between flex-row ">

                        <div class="w-100 input-before-style mr-3">
                            <input id="price_min" class="search-announcement form-control mw-50 p-3" type="number" placeholder="od">
                        </div>

                        <div class="w-100 input-before-style">
                            <input id="price_max" class="search-announcement form-control mw-50 p-3" type="number" placeholder="do">
                        </div>

                    </div>
                </div>
                <!-- KONIEC CENY -->

                <!-- LOKALIZACJA -->
                <div class="col-10 col-md-8 mb-5">
                    <div>
                        <label for="lokalizacja-input" class="col-8">
                            <h3 class="mb-3">Lokalizacja:</h3>
                        </label>
                        <div class="w-100 input-before-style">
                            <input type="text" class="search-announcement form-control mb-4 p-3" id="lokalizacja-input" placeholder="Opole..." />
                            <input type="text" id='longitude' hidden />
                            <input type="text" id='latitude' hidden />
                        </div>
                    </div>
                </div>
                <!-- KONIEC LOKALIZACJA -->

                <!-- PROMIEŃ WYSZUKAŃ -->
                <div class="col-10 col-md-8 mb-5">
                    <div>
                        <label for="rangeValue" class="col-8 w-100">
                            <h3>Promień wyszukiwań:</h3>
                        </label>
                        <p id="rangeText">1km</p>
                        <input type="range" class="search-announcement form-range" id="rangeValue" data-slider-min="1" data-slider-max="100" value="1" />
                    </div>
                </div>
                <!-- KONIEC PROMIEŃ -->

                <!-- KATEGORIE -->
                <div class="col-10 col-md-8 mb-5">
                    <div id="categories">
                        <label class="col-8 w-100">
                            <h3 class="mb-3">Kategorie:</h3>
                        </label>
                        @php
                        $category=$category??'';
                        @endphp
                        @foreach ($categories as $category_tmp)
                        @if($category=== $category_tmp->name)
                        <button class="btn button-on text-nowrap m-2 px-4 py-2" onclick="buttonStatus(this)" value="{{$category_tmp->name}}">{{$category_tmp->name}}</button>
                        @else
                        <button class="btn button-off text-nowrap m-2 px-4 py-2" onclick="buttonStatus(this)" value="{{$category_tmp->name}}">{{$category_tmp->name}}</button>
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- KONIEC KATEGORIE -->
        </div>
        <!-- KONIEC LEWEJ KOLUMNY -->

        <!-- PRAWA KOLUMNA -->
        <div class="col-12 col-md-7 mt-0 mt-md-5 p-3 p-md-0">
            <div class="w-100">
                <h3 class="text-primary mb-3">Wpisz interesującą frazę</h3>

                <!-- SEARCH BUTTON -->
                <div class="w-100 d-flex">

                    <!-- Input wrapped in div to let css ::before pseudoclass to be active -->
                    <div class="w-100 input-before-style">
                        <input type="search" id='search' class="form-control" value="{{$name??''}}" placeholder="Np. sprzątanie biura..." style="height: 6vh; border-radius: .25rem 0 0 .25rem" />
                    </div>

                    <button id="mainSearch" type="button" class="btn btn-primary d-flex align-items-center justify-content-center" style="height: 6vh; padding: 0 20px; border-radius: 0 .25rem .25rem 0">
                        <x-feathericon-search class="text-white" style="margin-right: 6px;" /> Szukaj
                    </button>

                </div>
                <button type="button" data-bs-toggle="collapse" data-bs-target="#filtry" aria-expanded="false" class="d-block d-md-none btn-block btn button-off text-nowrap mt-3 px-4 py-2" href="#">
                    Kategorie i filtry
                </button>
                <!-- KONIEC SEARCH BUTTON -->

                <!-- OGŁOSZENIA -->
                <div id="zgloszeniaPlace" class="card d-flex w-100 mt-5 d-none p-3">
                    @include('components.announcement',['search'=>true])
                </div>
                <!-- OGLOSZENIA END -->
            </div>
        </div>
    </div>
    <!-- KONIEC PRAWEJ KOLUMNY -->
    </div>
    </div>
    <div class="toTop bg-primary" id="toTopButton" onclick="scrollToTop()">
        ↑
    </div>
    <footer>

    </footer>
    <script src="https://maps.google.com/maps/api/js?key=AIzaSyD-Vt-coVq0Nqd2VZc_tEZvvylA36vIO3s&libraries=places" type="text/javascript"></script>

    <script src="./bootstrap/js/bootstrap.bundle.min.js"></script>
    <script>
        // Map api
        google.maps.event.addDomListener(window, "load", initialize);

        function initialize() {
            var input = document.getElementById("lokalizacja-input");
            var autocomplete = new google.maps.places.Autocomplete(input);
            autocomplete.addListener("place_changed", function() {
                var place = autocomplete.getPlace();
                longitude.value = place.geometry.location.lng()
                latitude.value = place.geometry.location.lat()
            });
        }
        // End Map api

        let i = 1;
        let rangeVal = document.querySelector('#rangeValue');
        let rangeTxt = document.querySelector('#rangeText');
        rangeVal.addEventListener('input', () => {
            rangeTxt.innerHTML = rangeVal.value + 'km'
        })

        function buttonStatus(evt) {
            startCountingToSearch();

            if (evt.classList.contains('button-off')) {
                evt.classList.remove('button-off')
                evt.classList.add('button-on')
                evt.style.color = 'white';
            } else if (evt.classList.contains('button-on')) {
                evt.classList.remove('button-on')
                evt.classList.add('button-off')
                evt.style.color = 'black';
            }
        }

        function scrollToTop() {
            window.scrollTo(0, 0);
            document.querySelector('#toTopButton').style.display = "none";
        }
        document.body.addEventListener('wheel', () => {
            showScroll();
        })
        window.addEventListener('scroll', () => {
            showScroll();
        })

        function showScroll() {
            if (window.scrollY > window.screen.height / 3) {
                document.querySelector('#toTopButton').style.display = "flex"
            } else {
                document.querySelector('#toTopButton').style.display = "none"
            }
        }
        showScroll()


        const API_URL = "/api/announcement?";
        const zgloszeniaPlace = document.getElementById('zgloszeniaPlace');
        const inputsOpoznione = document.querySelectorAll('.search-announcement');
        const priceMinInput = document.getElementById('price_min');
        const priceMaxInput = document.getElementById('price_max');
        const rangeInput = document.getElementById('rangeValue');
        const titleInput = document.getElementById('search');
        const longitudeInput = document.getElementById('longitude');
        const latitudeInput = document.getElementById('latitude');
        let zgloszenieCard;
        let delayRequest;

        const getAnnouncementCard = ({
            id,
            img,
            title,
            desc,
            price,
            localization
        }) => {
            const cloneCard = zgloszenieCard.cloneNode(true);
            const imgSrc = img !== null ? `url('/uploads/${img}')` : "url('/uploads/placeholder.jpg')"

            try {
                cloneCard.querySelector("div.card-main-img-1").style.backgroundImage = imgSrc
                cloneCard.querySelector("h5.card-main-title").innerText = title
                cloneCard.querySelector("p.card-main-desc").innerText = desc
                cloneCard.querySelector("small.card-main-localization").innerText = localization

                cloneCard.querySelectorAll("h5.card-main-price").forEach(h5price => {
                    h5price.innerText = `${price}zł`
                })

                cloneCard.querySelector("a.card-main-a-show").setAttribute('href', `/singleOffer/${id}`)
            } catch (e) {
                console.error(e)
            }

            return cloneCard
        }

        const getZgloszenia = async () => {
            clearInterval(delayRequest);

            const categoriesButtonsOn = document.querySelector("#categories").querySelectorAll('.button-on');
            const categories = []
            categoriesButtonsOn.forEach(button => categories.push(button.value));

            const zgloszenia = await fetch(API_URL + new URLSearchParams({
                    title: titleInput.value,
                    price_min: priceMinInput.value,
                    price_max: priceMaxInput.value,
                    range: rangeInput.value,
                    longitude: longitudeInput.value,
                    latitude: latitudeInput.value,
                    categories,
                })).then(response => response.json())
                .catch(error => console.error(error))

            zgloszeniaPlace.innerHTML = "";
            if (zgloszenia.length === 0) {
                zgloszeniaPlace.innerHTML = "<div class='card p-3'>Brak rezultatów.. Spróbuj zastosować inne filtry!</div>"
            } else {
                // Reset first card margin
                zgloszeniaPlace.innerHTML = "<div style='margin-top: -1rem;'></div>"

                zgloszenia.forEach(zgloszenie => {
                    if (zgloszenie !== undefined) {
                        zgloszeniaPlace.appendChild(getAnnouncementCard({
                            id: zgloszenie.id,
                            img: zgloszenie.img1,
                            title: zgloszenie.title,
                            desc: zgloszenie.description,
                            price: zgloszenie.price,
                            localization: zgloszenie.localization,
                        }))
                    }
                })
            }
        }

        const startCountingToSearch = () => {
            clearInterval(delayRequest);
            delayRequest = setInterval(getZgloszenia, 1000);
        }

        // Get card component
        zgloszenieCard = zgloszeniaPlace.querySelector(".card")
        zgloszeniaPlace.innerHTML = ""
        zgloszeniaPlace.classList.remove("d-none")

        // Init call
        getZgloszenia()

        // Actions
        document.getElementById("mainSearch").addEventListener("click", getZgloszenia)
        inputsOpoznione.forEach(input => {
            input.addEventListener("change", startCountingToSearch)
            input.addEventListener("keydown", startCountingToSearch)
        })
    </script>
</body>

</html>