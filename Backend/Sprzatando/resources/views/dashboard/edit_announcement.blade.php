@extends('dashboard.main_layout')

@section('main')
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

<main class="col-md-9 col-sm-12 ms-sm-auto col-lg-10 px-md-4 bg-light">
    <div class="d-flex justify-content-start flex-row flex-md-column align-items-center pt-3 pb-2 mb-3">
        <div class="row w-100 match-height">
            @include('dashboard.status')
            <div class="card col-lg col-lg-12 d-flex flex-lg-row flex-md-column justify-content-around">
                <div class="col-lg-5">
                    <div class="card-body d-flex flex-column align-items-start justify-content-between">
                        <h2 class="card-title text-primary mt-4 mb-4 ">Edytuj ogłoszenie</h2>
                        <form class="w-100" method='POST' action="{{ route('announcement.edit', $announcement->id) }}" enctype="multipart/form-data">
                            <label for="FormControlInput1 col-offset">Tytuł</label>
                            <input type="text" name='title' required value="{{$announcement->title}}" class="form-control mb-4" />
                            <label for="FormControlInput1 col-offset">Lokalizacja</label>
                            <input type="text" name='localization' value="{{$announcement->localization}}" required id='LocalizationAutocomplete' class="form-control mb-4" />
                            <label for="FormControlInput1 col-offset">Cena</label>
                            <input type="number" min="1" required name='price' value="{{$announcement->price}}" step="0.05" class="form-control mb-4" />
                            <label for="FormControlInput1 col-offset">Opis</label>
                            <textarea maxlength="500" id="descriptionTA" name='description' required class="form-control mb-1" style="resize: none; height: 30vh;">{{$announcement->description}}</textarea>

                            <p>Pozostało <span id="signs">500</span> znaków</p>
                    </div>
                </div>
                <div class="col-lg-5 d-flex align-items-center justify-content-center">
                    <div class="card-body d-flex flex-column align-items-center justify-content-around h-100">
                        {{-- <form class="w-100" > --}}
                        @csrf
                        <p>&nbsp;</p>
                        <label for="FormControlInput1 col-offset mt-6">Czas ważności</label>
                        <input value="{{$announcement->date}}" type="date" name='expiring_at' class="form-control mt-1 mb-5" />
                        <label for="FormControlInput1 col-offset">Kategoria:</label>
                        <select name='category_id' class="form-select mb-5 mt-1">
                            @foreach ($categories as $category)
                            @if($category->id == $announcement->category_id)
                            <option value="{{$category->id}}" selected>{{$category->name}}</option>
                            @else
                            <option value="{{$category->id}}">{{$category->name}}</option>

                            @endif

                            @endforeach

                        </select>
                        <label for="FormControlInput1 col-offset" class="mb-3">Dodaj zdjęcia:</label> <br />

                        <div class="custom-file d-flex justify-content-between align-items-start w-100 mb-5" style="height: 15vh;">
                         
                            <div class="w-25">
                                <input class="form-control mb-3" type="file" name='img1' accept="image/png, image/jpeg" id="formFileDisabled1"/>
                                <label class="form-check-label position-relative ramka-image" for="formFileDisabled1">
                                <div class="add-image" >
                                <img src="/img/dashboard/rec.png" height="150px" width="150px" id="first-image" class="img-fluid add-image zIndex2" draggable="false"/>
                                    <div class="plus-add" id="sectionAddFirstImage">+</div>
                                </div>
                                <div class="delete-image w-100" id="first-delete-image">Usuń zdjęcie</div>
                            </label>
                            </div>
                            <div class="w-25  d-flex flex-column">
                                <input class="form-control mb-3" type="file" name='img2' accept="image/png, image/jpeg" id="formFileDisabled2" />
                                <label class="form-check-label position-relative ramka-image" for="formFileDisabled2">
                                <div class="add-image">
                                <img src="/img/dashboard/rec.png" height="150px" width="150px" id="second-image" class="img-fluid add-image zIndex2" draggable="false"/>
                                    <div class="plus-add" id="sectionAddSecondImage">+</div>
                                </div>
                                <div class="delete-image w-100" id="second-delete-image">Usuń zdjęcie</div>
                            </label>
                            </div>
                            <div class="w-25">
                                <input class="form-control mb-3" type="file" name='img1' accept="image/png, image/jpeg" id="formFileDisabled3" />
                                <label class="form-check-label position-relative ramka-image" for="formFileDisabled3">
                                <div class="add-image" >
                                <img src="/img/dashboard/rec.png" height="150px" width="150px" id="third-image" class="img-fluid add-image zIndex2" draggable="false"/>
                                    <div class="plus-add" id="sectionAddThirdImage">+</div>
                                </div>
                                <div class="delete-image w-100" id="third-delete-image">Usuń zdjęcie</div>
                            </label>
                            </div>
                        </div><br />
                        <button class="btn btn-outline-primary w-100 mt-5 mb-1">Archiwizuj</a>
                        <button type='submit' class="btn btn-primary w-100 mb-1">Zapisz zmiany</a>
                            </form>
                    </div>
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