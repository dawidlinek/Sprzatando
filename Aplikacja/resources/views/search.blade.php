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
        <div class="col-4 mt-5 d-flex flex-column align-items-center">

            <!-- CENA -->
            <div class="col-8 mb-5">
                <div class="col-10 col-sm-12">

                    <label class="col-8">
                        <h3 class="mb-3">Cena:</h3>
                    </label>

                    <div class="d-flex w-100 justify-content-between flex-md-row flex-sm-column ">

                        <div class="w-100 input-before-style mr-3">
                            <input class="form-control mw-50 p-3" type="number" placeholder="od">
                        </div>

                        <div class="w-100 input-before-style">
                            <input class="form-control mw-50 p-3" type="number" placeholder="do">
                        </div>

                    </div>
                </div>
            </div>
            <!-- KONIEC CENY -->

            <!-- LOKALIZACJA -->
            <div class="col-8 mb-5">
                <div>
                    <label for="lokalizacja-input" class="col-8">
                        <h3 class="mb-3">Lokalizacja:</h3>
                    </label>
                    <div class="w-100 input-before-style">
                        <input type="text" class="form-control mb-4 p-3" id="lokalizacja-input" placeholder="Opole..." />
                    </div>
                </div>
            </div>
            <!-- KONIEC LOKALIZACJA -->

            <!-- PROMIEŃ WYSZUKAŃ -->
            <div class="col-8 mb-5">
                <div>
                    <label for="rangeValue" class="col-8 w-100">
                        <h3>Promień wyszukiwań:</h3>
                    </label>
                    <p id="rangeText">0km</p>
                    <input type="range" class="form-range " id="rangeValue" data-slider-min="0" data-slider-max="100" value="0" />
                </div>
            </div>
            <!-- KONIEC PROMIEŃ -->

            <!-- KATEGORIE -->
            <div class="col-8 mb-5">
                <div>
                    <label class="col-8 w-100">
                        <h3 class="mb-3">Kategorie:</h3>
                    </label>

                    <button class="btn button-off text-nowrap m-2 px-4 py-2" onclick="buttonStatus(this)">Auto</button>
                    <button class="btn button-off text-nowrap m-2 px-4 py-2" onclick="buttonStatus(this)">Zamiatanie</button>
                    <button class="btn button-off text-nowrap m-2 px-4 py-2" onclick="buttonStatus(this)">Wycieranie</button>
                    <button class="btn button-off text-nowrap m-2 px-4 py-2" onclick="buttonStatus(this)">Mycie Okien</button>
                    <button class="btn button-off text-nowrap m-2 px-4 py-2" onclick="buttonStatus(this)">Lokale</button>
                    <button class="btn button-off text-nowrap m-2 px-4 py-2" onclick="buttonStatus(this)">Pranie</button>
                    <button class="btn button-off text-nowrap m-2 px-4 py-2" onclick="buttonStatus(this)">Dezynfekcja</button>
                </div>
            </div>
            <!-- KONIEC KATEGORIE -->
        </div>
        <!-- KONIEC LEWEJ KOLUMNY -->

        <!-- PRAWA KOLUMNA -->
        <div class="col-7 mt-5">
            <div class="w-100">
                <h3 class="text-primary mb-3">Wpisz interesującą frazę</h3>

                <!-- SEARCH BUTTON -->
                <div class="w-100 d-flex">

                    <!-- Input wrapped in div to let css ::before pseudoclass to be active -->
                    <div class="w-100 input-before-style">
                        <input type="search" id='search' class="form-control" placeholder="Np. sprzątanie biura..." style="height: 6vh; border-radius: .25rem 0 0 .25rem" />
                    </div>

                    <button type="button" class="btn btn-primary d-flex align-items-center justify-content-center" onclick="window.location='/search?name='+search.value" style="height: 6vh; padding: 0 20px; border-radius: 0 .25rem .25rem 0">
                        <x-feathericon-search class="text-white" style="margin-right: 6px;" /> Szukaj
                    </button>

                </div>
                <!-- KONIEC SEARCH BUTTON -->

                <!-- POJEDYNCZE OGŁOSZENIE -->
                <div class="card d-flex w-100 mt-5">

                </div>
                <!-- POJEDYNCZE OGŁOSZENIE END -->
            </div>
        </div>
    </div>
    <!-- KONIEC PRAWEJ KOLUMNY -->
    </div>
    </div>
    <div class="toTop bg-primary" onclick="scrollToTop()">
        ↑
    </div>
    <footer>

    </footer>
    <script src="./bootstrap/js/bootstrap.bundle.min.js"></script>
    <script>
        let i = 1;
        let rangeVal = document.querySelector('#rangeValue');
        let rangeTxt = document.querySelector('#rangeText');
        rangeVal.addEventListener('input', () => {
            rangeTxt.innerHTML = rangeVal.value + 'km'
        })

        function buttonStatus(evt) {
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
        }
    </script>
</body>

</html>