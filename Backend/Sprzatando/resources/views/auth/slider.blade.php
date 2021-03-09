    <!-- <Left column> -->
    <script src="https://cdn.jsdelivr.net/npm/animejs@3.0.1/lib/anime.min.js"></script>
    <div class="b-col col-6 vh-100 d-none d-lg-flex flex-column justify-content-around align-items-center" style="background-color: #e6f2ff">
        <div class="d-flex h-75 w-100 flex-column align-items-center justify-content-center" style="user-select:none">
            <div id="heroImage" class="h-75 w-50 zIndex2">&nbsp;</div>
            <img src="/img/login/floor.png" width="35%" class="carpet zIndex1 img-fluid max-width: 45%; height:auto position-absolute" draggable="false" />
            <p id="description" class="text-center w-100 zIndex2 m-3" style="color:var(--tertiary); font-size: 22px">
                Jako zalogowany użytkownik <br />
                masz dostęp do większej palety funkcjonalności!
            </p>
        </div>
        <div class="d-flex w-100 justify-content-center zIndex2">
            <div id="first-bar" class="bar m-1 h-50 bg-primary mainBtn"> </div>
            <div id="second-bar" class="bar m-1 h-50 noMainBtn" style="background: var(--primary-opacity);"> </div>
            <div id="third-bar" class="bar m-1 h-50 noMainBtn" style="background: var(--primary-opacity);"> </div>
        </div>
    </div>
    <!-- </Right column> -->
    {{-- </div> --}}
    <script src="/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/js/slider.js"></script>