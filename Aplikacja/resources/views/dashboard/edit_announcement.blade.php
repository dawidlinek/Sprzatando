@extends('dashboard.main_layout')

@section('main')
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

<main class="col-md-9 col-sm-12 ms-sm-auto col-lg-10 px-md-4 bg-light">

    <div class="d-flex justify-content-start flex-row flex-md-column align-items-center pt-3 pb-2 mb-3">
        <div class="row w-100 match-height">
            @include('dashboard.status')
            <div class="card" style="padding-bottom: 1rem;">

                <!-- <Title  -->
                <div class="row w-100">
                    <div class="col col-12 marginLeftDesktop">
                        <h2 class="card-title text-primary mt-4 mb-4"> @if($announcement->status=='active' || $announcement->status=='reported') Edytuj ogłoszenie @else Podgląd ogłoszenia @endif</h2>
                    </div>
                </div>
                <!-- </Title  -->

                <!-- <Main form> -->
                <form class="w-100" method='POST' id='update' action='{{route('announcement.update',$announcement->id)}}' enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="row w-100 d-flex flex-lg-row flex-md-column justify-content-around">

                        <!-- Left column -->
                        <div class="col-xl-5">
                            <div class="d-flex flex-column align-items-start justify-content-between">

                                <label for="FormControlInput1 col-offset">Tytuł</label>
                                <input @if($announcement->status!='active' && $announcement->status!='reported') disabled @endif type="text" name='title' required value="{{$announcement->title}}" class="form-control mb-4" />
                                <label for="FormControlInput1 col-offset">Lokalizacja</label>
                                <input type="text" @if($announcement->status!='active' && $announcement->status!='reported') disabled @endif name='localization' required value="{{$announcement->localization}}" id='LocalizationAutocomplete' class="form-control mb-4" />
                                <input name="longitude" id='longitude'  value="{{$announcement->longitude}}" type="text" hidden/>
                                <input name="latitude" id='latitude' value="{{$announcement->latitude}}" type="text" hidden/>
                                <label for="FormControlInput1 col-offset">Cena</label>
                                <input type="number" @if($announcement->status!='active' && $announcement->status!='reported') disabled @endif min="1" required name='price' value="{{$announcement->price}}" step="0.05" class="form-control mb-4" />
                                <label for="FormControlInput1 col-offset">Opis</label>
                                <textarea maxlength="500" @if($announcement->status!='active' && $announcement->status!='reported') disabled @endif id="descriptionTA" name='description' required class="form-control mb-1" style="resize: none; height: 30vh;">{{$announcement->description}}</textarea>

                                <p @if($announcement->status!='active' && $announcement->status!='reported') class='d-none' @endif >Pozostało <span id="signs">500</span> znaków</p>
                            </div>
                        </div>


                        <!-- Right column -->
                        <div class="col-xl-5">
                            <div class="d-flex h-100 flex-column align-items-start justify-content-between">

                                <div class="w-100">
                                    <label for="FormControlInput1 col-offset mt-6">Czas ważności</label>
                                    <input id='datePickerId' type="date" @if($announcement->status!='active' && $announcement->status!='reported') disabled @endif name='expiring_at' value="{{date("Y-m-d",strtotime($announcement->expiring_at))}}" class="form-control mb-4" />

                                    <!-- <Kategorie> -->
                                    <label for="FormControlInput1 col-offset">Kategorie:</label> <br />
                                    <input @if($announcement->status!='active' && $announcement->status!='reported') disabled @endif type="text" name="categories" class="d-none" id="categoryServerSee" value="{{implode(',',$announcement->categories()->pluck('id')->toArray())}}" />
                                    <select class="form-select" id="categorySelect" @if($announcement->status!='active' && $announcement->status!='reported') disabled @endif class="form-select mb-4">
                                        @php $selected=$announcement->categories()->pluck('name')->toArray() @endphp
                                        <option selected value="-1" hidden></option>
                                        @foreach ($categories as $category)
                                        @if (in_array($category->name,$selected))
                                        <option value="{{$category->id}}" class="selectedOption">{{$category->name}}</option>
                                        @else
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endif

                                        @endforeach
                                    </select>
                                    <!-- </Kategorie> -->



                                    <!-- <Image select> -->
                                    <label for="FormControlInput1 col-offset" class="mb-3 mt-3"> @if($announcement->status=='active' && $announcement->status!='reported')Dodaj zdjęcia: @else Zobacz zdjęcia @endif</label>
                                    <div class="custom-file d-flex justify-content-md-between justify-content-around align-items-start w-100 mb-2 mb-xl-5" style="height: 15vh;">
                                        @php $tmp=["o",'first','second','third']@endphp
                                        @for ($i = 1; $i < 4; $i++) @if((array)$announcement['img'.$i]==Null) <input @if($announcement->status!='active' && $announcement->status!='reported') disabled @endif class="form-control mb-3" type="file" name='img{{$i}}' accept="image/png, image/jpeg" id="formFileDisabled{{$i}}" />
                                            <label class="form-check-label position-relative ramka-image" for="formFileDisabled{{$i}}">
                                                <div class="add-image">
                                                    <img src="/img/dashboard/rec.png" height="150px" width="150px" id="{{$tmp[$i]}}-image" class="img-fluid add-image zIndex2" draggable="false" />
                                                    <div class="plus-add" id="sectionAdd{{strtoupper($tmp[$i][0]).substr($tmp[$i],1,strlen($tmp[$i]))}}Image">+</div>
                                                </div>
                                                <div class="delete-image w-100" id="{{$tmp[$i]}}-delete-image">Usuń zdjęcie</div>
                                            </label>


                                            @else

                                            <label class="form-check-label position-relative ramka-image">
                                                <div class="add-image">
                                                    <img src="/uploads/{{ $announcement['img'.$i] }}" height="150px" width="150px" class="img-fluid add-image zIndex2" draggable="false" />
                                                </div>
                                                @if($announcement->status=='active' && $announcement->status!='reported')
                                                <form></form>
                                                <form method='POST' id='deletef{{$i}}' class='delete-images' onsubmit="return confirm('Czy na pewno chcesz usunąć zdjęcie?')" action='{{route('announcement.destroy',$announcement->id)}}?id={{$i}}'>
                                                    @method('DELETE')
                                                    @csrf
                                                    <button class="delete-image w-100  edit-image" form='deletef{{$i}}'>Usuń zdjęcie</button>
                                                </form>
                                                @endif
                                            </label>
                                            <div id='{{$tmp[$i]}}-delete-image'> </div>
                                            <div id='formFileDisabled{{$i}}'> </div>
                                            @endif
                                            @endfor

                                    </div>
                                </div>
                                <input hidden @if($announcement->status!='active' && $announcement->status!='reported')  disabled @endif name='status' id='status' type='text' value/>

                                <div class="w-100" style="margin-bottom: 2.8rem;">
                                    @method('PUT')
                                    @if($announcement->status=='active' || $announcement->status=='reported')
                                    <button type='submit' onclick="status.value='finished';update.submit()" class="btn btn-outline-primary w-100 mt-3">Zakończ ofertę</a>
                                        <button type='submit' form='update' class="btn btn-primary w-100 mt-3 text-white" onclick="update.submit()">Zapisz</button>
                                        @else
                                        <a class="btn btn-primary w-100 mt-3 text-white" href='{{route('announcement.index')}}'>Powrót</a>

                                        @endif

                </form>
            </div>
        </div>
    </div>

    <!-- </Image select> -->

    </div>



    
</main>
@if($announcement->status=='active' ||$announcement->status=='reported')
<main class="col-md-9 col-sm-12 ms-sm-auto col-lg-10 px-md-4 bg-light">
    <div class="d-flex justify-content-start flex-row flex-md-column align-items-center pt-3 pb-2 mb-3">
        @if($announcement->engaged()->where('status','engaged')->count()==0)
        <div class="card-body d-flex flex-column align-items-start justify-content-between w-100 h-75 card ">
            <h2 class="card-title text-primary mt-4 mb-4 ">Niestety nie masz jeszcze chętnych zleceniobiorców</h2>
           
        </div>
        @else
        <div class="row w-100 match-height">

            <div style='    min-height: 70vh' class="col-lg col-lg-12 d-flex flex-lg-row flex-md-column justify-content-around">
                <div class="col-lg-5">
                    <div class="card-body d-flex flex-column align-items-start justify-content-between w-100 h-75 card ">
                        <h2 class="card-title text-primary mt-4 mb-4 ">Wybierz zleceniodawce</h2>
                        <div class="w-100" id="principals">
                            @foreach ($announcement->engaged()->where('status','engaged')->get() as $eng)
                            {{-- {{dd($eng->userDetails)}} --}}
                            <div class="card flex-row align-items-center py-4 my-3 mx-2 w-100 profile" data-user="{{$eng->user}}">
                                <img src="/img/avatar.jpg" class="avatarImage mx-3"> 
                                <p class="mb-0 text-primary" data-user='{{$eng->userDetails->id}}'>{{$eng->userDetails->name}}</p>
                            </div>
                            @endforeach
                           
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 d-flex  justify-content-center">
                    <div class="card-body d-flex flex-column  justify-content-around h-75 card " id="detailOffDiv">
                        <h1>Liczba zgłoszeń</h1>
                        <p>{{$announcement->engaged()->where('status','engaged')->count()}}</p>
                        <h1>Wyświetlenia zgłoszenia</h1>
                        <p>{{$announcement->views}}</p>
                    </div>
                    <div class="card-body d-none flex-column  card h-75" id="detailOnDiv">
                        <div class="d-flex h-25 align-items-center ">
                            <img src="/img/avatar.jpg" class="mainAvatarImage mx-3" height="100%">
                            <div class="mb-3">
                                <h1 class="text-primary" id="detailName"></h1>
                                <p >Konto stworzone <span id="detailDate"></span></p>
                            </div>
                        </div>
                        <div class="mt-1 mb-3">
                            <h2 class="text-primary">Ostatnie zlecenie</h2>
                            <p id="detailDescription"></p>
                        </div> 
                        <div class="mt-1 mb-5">
                            <h2 class="text-primary">Statystyki użytkownika</h2>
                            <p class="mb-0">Ilość zrealizowanych zleceń: <span id="detailNumberOfOrder"></span></p>
                            <p class="mb-0">Ostatnia ocena użytkownika: <span id="detailLastRating">*</span></p>
                            <p class="mb-0">Średnia ocena użytkownika: <span id="detailAvgRating">*</span></p>
                        </div>
                        <div class="d-flex flex-column mt-3">
                            <button class="btn bg-white border border-primary border-4 mb-3 w-100" onclick="discard({{$eng->userDetails->id}})">Odrzuć</button>
                            <form action="/dashboard/announcement/{{$announcement->id}}/accept/{{$eng->userDetails->id}}" method="POST" onsubmit="return confirm('Wybranie wykonawcy jest równoznaczne z zakończeniem ogłoszenia. Czy na pewno chcesz wykonać tą akcję?')">
                                @csrf
                                {{-- <input type="text" name='user' value='{{$eng->userDetails->id}}' hidden> --}}
                                <button class="btn btn-primary w-100" type="submit">Wybierz zleceniobiorcę</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        @endif
    </div>
</div>
</div>
</main>
@elseif($announcement->status=='finished') 
<main class="col-md-9 col-sm-12 ms-sm-auto col-lg-10 px-md-4 bg-light">
    <div class="d-flex justify-content-start flex-row flex-md-column align-items-center pt-3 pb-2 mb-3">
        {{-- @if($announcement->engaged()->where('status','engaged')->count()==0)
        <div class="card-body d-flex flex-column align-items-start justify-content-between w-100 h-75 card ">
            <h2 class="card-title text-primary mt-4 mb-4 ">Niestety nie masz jeszcze chętnych zleceniobiorców</h2>
           
        </div>
        @else --}}
        <div class="row w-100 match-height">
@php $user=$announcement->engaged()->where('status','selected')->first()->userDetails @endphp
            <div style='    min-height: 70vh' class="col-lg col-lg-12 d-flex flex-lg-row flex-md-column justify-content-around">
                <div class="col-lg-5">
                    <div class="card-body flex-column  card h-75" id="detailOnDiv">
                        <div class="d-flex h-25 align-items-center ">
                            <img src="/img/avatar.jpg" class="mainAvatarImage mx-3" height="100%">
                            <div class="mb-3">
                                <h1 class="text-primary" id="detailName">{{$user->name}}</h1>
                                <p >Konto stworzone <span id="detailDate">{{$user->created_at}}</span></p>
                            </div>
                        </div>
                        <div class="mt-1 mb-3">
                            <h2 class="text-primary">Ostatnie zlecenie</h2>
                            <p id="detailDescription"></p>
                        </div> 
                        <div class="mt-1 mb-5">
                            <h2 class="text-primary">Statystyki użytkownika</h2>
                            <p class="mb-0">Ilość zrealizowanych zleceń: <span id="detailNumberOfOrder">{{$user->engaged()->where('status','selected')->count()}}</span></p>
                            <p class="mb-0">Ostatnia ocena użytkownika: <span id="detailLastRating">{{$user->engaged()->where('status','selected')->latest()->first()->details->rating ??''}}</span></p>
                            <p class="mb-0">Średnia ocena użytkownika: <span id="detailAvgRating">*</span></p>
                        </div>
                    </div>
                </div>
                
                
                <div class="col-lg-5 d-flex  justify-content-center">
                    
                    <div class="card-body d-flex flex-column  justify-content-around h-75 card " id="detailOffDiv">
                        <form action="/dashboard/announcement/{{$announcement->id}}/rating" class='w-100' method="POST">
                        <h1>Oceń zleceniobiorcę</h1>
                        <p id='gwiazdki'>@for($i=0;$i<$announcement->rating??5;$i++)⭐@endfor</p>
                        <input type="range" min="1" max="6" value="{{$announcement->rating??5}}" {{$announcement->rating?'disabled':""}} name='rating' class="slider" id="myRange"><br>
                        <label for="">Napisz krótką opinię o zleceniobiorcy</label>
                        <textarea name="rating_description" class='w-100' id="" cols="30" rows="10" {{$announcement->rating?'disabled':""}}>{{$announcement->rating_description??''}}</textarea>
                        
                        <div class="d-flex flex-column mt-3">
                                @csrf
                                 @if(!$announcement->rating)
                                <button class="btn btn-primary w-100" type="submit">Oceń zleceniobiorcę</button>
                                @endif
                            </div>
                        </form>
                        </div>
                        

                </div>
            </div>


        </div>
        {{-- @endif --}}
    </div>
</div>
</div>
</main>
@endif
    <!-- </Main form> -->


    {{-- <script>
    const firstImage = document.querySelector('#first-image');
const firstDeleteImage = document.querySelector('#first-delete-image');
const sectionFirstImage = document.querySelector('#sectionAddFirstImage');
    firstDeleteImage.addEventListener('click',()=>{
        firstImage.src = "";
        sectionFirstImage.style.display = 'flex';
        firstDeleteImage.classList.remove('d-flex')
        firstImage.style.display = 'none';
    })
    
const secondImage = document.querySelector('#second-image');
const secondDeleteImage = document.querySelector('#second-delete-image');
const sectionSecondImage = document.querySelector('#sectionAddSecondImage');
    secondDeleteImage.addEventListener('click',()=>{
        secondImage.src = "";
        sectionSecondImage.style.display = 'flex';
        secondImage.style.display = 'none';
        secondDeleteImage.classList.remove('d-flex')
    })
    
const thirdImage = document.querySelector('#third-image');
const thirdDeleteImage = document.querySelector('#third-delete-image');
const sectionThirdImage = document.querySelector('#sectionAddThirdImage');
    thirdDeleteImage.addEventListener('click',()=>{
        thirdImage.src = "";
        sectionThirdImage.style.display = 'flex';
        thirdImage.style.display = 'none';
        thirdDeleteImage.classList.remove('d-flex')
    })

    
const descriptionTextArea = document.querySelector('#descriptionTA');
const leftSigns = document.querySelector('#signs');
descriptionTextArea.addEventListener('input',()=>{
    leftSigns.innerHTML = 500-descriptionTextArea.value.length;
})
</script> --}}
    <script src="https://maps.google.com/maps/api/js?key=AIzaSyD-Vt-coVq0Nqd2VZc_tEZvvylA36vIO3s&libraries=places" type="text/javascript"></script>
    <script defer src="/js/addingannouncement.js"></script>
    <script src="/js/profilDetail.js"></script>


@endsection