@extends('dashboard.main_layout')

@section('main')

<main class="col-md-9 col-sm-12 ms-sm-auto col-lg-10 px-md-4 bg-light">
    <div class="d-flex justify-content-start flex-row flex-md-column align-items-center pt-3 pb-2 mb-3">
        <div class="row w-100 match-height">

            <div class="col-lg col-lg-12 d-flex flex-lg-row flex-md-column justify-content-around" style='height:90vh'>
                <div class="col-lg-5">
                    <div class="card-body d-flex flex-column align-items-start justify-content-between w-100 h-75 card ">
                        <h2 class="card-title text-primary mt-4 mb-4 ">Szukaj użytkownika</h2>
                        <label for="search-user">ID użytkownika/ Imię/ Nazwisko</label>
                        <input type="text" class="form-control mb-3" id="search-user" value='' aria-describedby="basic-addon3">
                        <div class="w-100" id="principals">
                            @foreach ($users as $user)
                            <div data-user='{{$user->id}}' class="card flex-row align-items-center py-4 my-3 mx-2 w-100 profile">
                                <img src="/img/avatar.jpg" class="avatarImage mx-3">
                                <p class="mb-0 text-primary" data-user='{{$user->id}}'>{{$user->name}}</p>
                            </div>
                                
                            @endforeach
                           
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 d-flex  justify-content-center">
                    <div class="card-body d-flex flex-column  justify-content-around h-75 card " id="detailOffDiv">
                        <h1>Liczba Użytkowników</h1>
                        <p>{{count($users)}}</p>
                        {{-- <h1>Ocena zgłoszenia</h1>
                        <p>*gwiazdka*</p> --}}
                    </div>
                    <div class="card-body d-none flex-column  card h-75" id="detailOnDiv">
                        <div class="d-flex h-25 align-items-center ">
                            <img src="/img/avatar.jpg" class="mainAvatarImage mx-3" height="100%">
                            <div class="mb-3">
                                <h1 class="text-primary" id="detailName">Tomasz Piekała</h1>
                                <p >Konto stworzone <span id="detailDate">21.02.2021</span></p>
                            </div>
                        </div>
                        <div class="mt-1 mb-3">
                            <h2 class="text-primary">Ostatnie zlecenia</h2>
                            <p id="detailDescription">Moim zdaniem to nie ma tak, że dobrze albo że nie dobrze. Gdybym miał powiedzieć, co cenię w życiu najbardziej, powiedziałbym, że ludzi. Ekhm… Ludzi, którzy podali mi pomocną dłoń, kiedy sobie nie radziłem, kiedy byłem sam.</p>
                        </div> 
                        <div class="mt-1 mb-5">
                            <h2 class="text-primary">Statystyki użytkownika</h2>
                            <p class="mb-0">Ilość zrealizowanych zleceń: <span id="detailNumberOfOrder">124</span></p>
                            <p class="mb-0">Ostatnia ocena użytkownika: <span id="detailLastRating">*gwiazdki*</span></p>
                            <p class="mb-0">Średnia ocena użytkownika: <span id="detailAvgRating">*gwiazdki*</span></p>
                        </div>
                        <div class="d-flex flex-column mt-3">
                            <button class="btn bg-white border border-primary border-4 mb-3 w-100">Zbanuj (potem popup z wyborem daty)</button>
                            {{-- <button class="btn btn-primary w-100">Odrzuć</button> --}}
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
</div>
</main>
<script src="/js/profilDetail.js"></script>

@endsection