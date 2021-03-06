@extends('dashboard.main_layout')

@section('main')
            <main class="col-md-9 col-sm-12 ms-sm-auto col-lg-10 px-md-4 bg-light">
                <div class="d-flex justify-content-start flex-row flex-md-column align-items-center pt-3 pb-2 mb-3">
                    <div class="row w-100 match-height">

                        <div class="card col-lg col-lg-12 d-flex flex-lg-row flex-md-column justify-content-around">
                            <div class="col-lg-5">
                                <div class="card-body d-flex flex-column align-items-start justify-content-between">
                                    <h2 class="card-title text-primary mt-4 mb-4 ">Dodaj ogłoszenie</h2>
                                    <form class="w-100">
                                        <label for="FormControlInput1 col-offset">Tytuł</label>
                                        <input type="text" class="form-control mb-4" />
                                        <label for="FormControlInput1 col-offset">Lokalizacja</label>
                                        <input type="text" class="form-control mb-4" />
                                        <label for="FormControlInput1 col-offset">Cena</label>
                                        <input type="number" min="1" step="0.05" class="form-control mb-4" />
                                            <input type="radio" value="godzina" id="godzina" name="typUslugi" class="form-check-input mb-4" checked />
                                                <label for="godzina" class="mb-3">Stawka godzinowa</label>
                                            <input type="radio" value="calosc" id="calosc" name="typUslugi" class="form-check-input mb-4" />
                                                 <label for="calosc" class="mb-3">Stawka za całość</label> <br />
                                        <label for="FormControlInput1 col-offset">Opis</label>
                                        <textarea maxlength="500" id="descriptionTA" class="form-control mb-1" style="resize: none; height: 30vh;"></textarea>
                                    </form>
                                    <p >Pozostało <span id="signs">500</span> znaków</p>
                                </div>
                            </div>
                            <div class="col-lg-5 d-flex align-items-center justify-content-center">
                                <div class="card-body d-flex flex-column align-items-center justify-content-around h-100">
                                    <form class="w-100">
                                        <p>&nbsp;</p>
                                        <label for="FormControlInput1 col-offset mt-6">Czas ważności</label>
                                        <input type="number" class="form-control mt-1 mb-5" />
                                        <label for="FormControlInput1 col-offset" class="mb-5 ">Kategorie:</label> <br />
                                        <div class="d-flex flex-column">
                                            <div class="d-flex">
                                                <div class="w-33">
                                                    <input type="checkbox" value="ogród"class="form-check-input mb-4" />
                                                        <label for="ogród">Ogród</label>
                                                </div>
                                                <div class="w-33">
                                                    <input type="checkbox" value="ogród"class="form-check-input mb-4" />
                                                        <label for="ogród">Biuro</label>
                                                </div>
                                                <div class="w-33">
                                                    <input type="checkbox" value="ogród"class="form-check-input mb-4" />
                                                        <label for="ogród">Dachy</label>
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div class=" w-33">
                                                    <input type="checkbox" value="ogród"class="form-check-input mb-4" />
                                                        <label for="ogród">Mieszkanie</label>
                                                </div>
                                                <div class=" w-33">
                                                    <input type="checkbox" value="ogród"class="form-check-input mb-4" />
                                                        <label for="ogród">Mycie okien</label>
                                                </div>
                                            </div>
                                        </div>
                                        <label for="FormControlInput1 col-offset" class="mb-3">Dodaj zdjęcia:</label> <br />

                                            <div class="custom-file d-flex justify-content-between align-items-start w-100 mb-5" style="height: 15vh;">
                                                <div class="w-25">
                                                    <input class="form-control mb-3" type="file" id="formFileDisabled1"/>
                                                    <label class="form-check-label" for="formFileDisabled1"><img src="/img/dashboard/rec.png" height="150px" width="150px"  id="first-image" class="img-fluid" draggable="false"/></label>
                                                </div>
                                                <div class="w-25">
                                                    <input class="form-control mb-3" type="file" id="formFileDisabled2" />
                                                    <label class="form-check-label" for="formFileDisabled2"><img src="/img/dashboard/rec.png" height="150px" width="150px" id="second-image" class="img-fluid" draggable="false"/></label>
                                                </div>
                                                <div class="w-25">
                                                    <input class="form-control mb-3" type="file" id="formFileDisabled3" />
                                                    <label class="form-check-label" for="formFileDisabled3"><img src="/img/dashboard/rec.png" height="150px" width="150px" id="third-image" class="img-fluid" draggable="false"/></label>
                                                </div>
                                            </div><br />
                                    <button class="btn btn-primary w-100 mt-5 mb-1">Dodaj</a>
                                    </form>
                                </div>
                            </div>
                        </div>

                        
                    </div>
                </div>
        </div>
    </div>
    <script src="/js/addingannouncement.js"></script>
    </main>
    @endsection