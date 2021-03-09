@extends('dashboard.main_layout')

@section('main')
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

<main class="col-md-9 col-sm-12 ms-sm-auto col-lg-10 px-md-4 bg-light">

    <!-- Spacer -->
    <div class="pt-3 pb-2 mb-3"></div>

    <div class="row w-100 match-height m-auto">
        @include('dashboard.status')
        <div class="card">

            <!-- <Title  -->
            <div class="row w-100">
                <div class="col col-12 marginLeftDesktop">
                    <h2 class="card-title text-primary mt-4 mb-4">Dodaj ogłoszenie</h2>
                </div>
            </div>
            <!-- </Title  -->

            <!-- <Main form> -->
            <form class="w-100" method='POST' action='{{route('announcement.store')}}' enctype="multipart/form-data">
                @csrf
                <div class="row w-100 d-flex flex-lg-row flex-md-column justify-content-around">

                    <!-- Left column -->
                    <div class="col-xl-5">
                        <div class="d-flex flex-column align-items-start justify-content-between">

                            <label for="FormControlInput1 col-offset">Tytuł</label>
                            <input type="text" name='title' required class="form-control mb-4" />
                            <label for="FormControlInput1 col-offset">Lokalizacja</label>
                            <input type="text" name='localization' required id='LocalizationAutocomplete' class="form-control mb-4" />
                            <label for="FormControlInput1 col-offset">Cena</label>
                            <input type="number" min="1" required name='price' step="0.05" class="form-control mb-4" />
                            <label for="FormControlInput1 col-offset">Opis</label>
                            <textarea maxlength="500" id="descriptionTA" name='description' required class="form-control mb-1" style="resize: none; height: 30vh;"></textarea>

                            <p>Pozostało <span id="signs">500</span> znaków</p>
                        </div>
                    </div>


                    <!-- Right column -->
                    <div class="col-xl-5">
                        <div class="d-flex h-100 flex-column align-items-start justify-content-between">

                            <div class="w-100">
                                <label for="FormControlInput1 col-offset mt-6">Czas ważności</label>
                                <input type="date" name='expiring_at' class="form-control mb-4" />

                                <!-- <Kategorie> -->
                                <label for="FormControlInput1 col-offset">Kategorie:</label> <br />
                                <input type="text" class="d-none" id="categoryServerSee" value="" />
                                <select class="form-select" id="categorySelect" class="form-select mb-4">
                                    <option selected value="-1" hidden></option>
                                    @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>

                                    @endforeach
                                </select>
                                <!-- </Kategorie> -->



                                <!-- <Image select> -->
                                <label for="FormControlInput1 col-offset" class="mb-3 mt-3">Dodaj zdjęcia:</label>
                                <div class="custom-file d-flex justify-content-md-between justify-content-around align-items-start w-100 mb-2 mb-xl-5" style="height: 15vh;">
                                    <div class="w-33">
                                        <input class="form-control mb-3" type="file" name='img1' accept="image/png, image/jpeg" id="formFileDisabled1" />
                                        <label class="form-check-label position-relative ramka-image" for="formFileDisabled1">
                                            <div class="add-image">
                                                <img src="/img/dashboard/rec.png" height="150px" width="150px" id="first-image" class="img-fluid add-image zIndex2" draggable="false" />
                                                <div class="plus-add" id="sectionAddFirstImage">+</div>
                                            </div>
                                            <div class="delete-image w-100" id="first-delete-image">Usuń zdjęcie</div>
                                        </label>
                                    </div>
                                    <div class="w-33 d-flex flex-column">
                                        <input class="form-control mb-3" type="file" name='img2' accept="image/png, image/jpeg" id="formFileDisabled2" />
                                        <label class="form-check-label position-relative ramka-image" for="formFileDisabled2">
                                            <div class="add-image">
                                                <img src="/img/dashboard/rec.png" height="150px" width="150px" id="second-image" class="img-fluid add-image zIndex2" draggable="false" />
                                                <div class="plus-add" id="sectionAddSecondImage">+</div>
                                            </div>
                                            <div class="delete-image w-100" id="second-delete-image">Usuń zdjęcie</div>
                                        </label>
                                    </div>
                                    <div class="w-3">
                                        <input class="form-control mb-3" type="file" name='img1' accept="image/png, image/jpeg" id="formFileDisabled3" />
                                        <label class="form-check-label position-relative ramka-image" for="formFileDisabled3">
                                            <div class="add-image">
                                                <img src="/img/dashboard/rec.png" height="150px" width="150px" id="third-image" class="img-fluid add-image zIndex2" draggable="false" />
                                                <div class="plus-add" id="sectionAddThirdImage">+</div>
                                                <div class="delete-image w-100" id="third-delete-image">Usuń zdjęcie</div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- </Image select> -->

                        <div class="w-100" style="margin-bottom: 2.8rem;">
                            <button type='submit' class="btn btn-primary w-100 mt-3 text-white">Dodaj</a>
                        </div>
                    </div>
                </div>
            </form>
            <!-- </Main form> -->

        </div>
    </div>
    </div>
    </div>
    </div>
    </div>

    <script src="https://maps.google.com/maps/api/js?key=AIzaSyD-Vt-coVq0Nqd2VZc_tEZvvylA36vIO3s&libraries=places" type="text/javascript"></script>


    <script defer src="/js/addingannouncement.js"></script>
</main>
@endsection