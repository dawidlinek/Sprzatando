@extends('dashboard.main_layout')

@section('main')

<main class="col-md-9 col-sm-12 ms-sm-auto col-lg-10 px-md-4 bg-light">
    <div class="d-flex justify-content-start flex-row flex-md-column align-items-center pt-3 pb-2 mb-3">
        <div class="row w-100 d-flex flex-column flex-lg-row align-items-start justify-content-between">
            @include('components.info')
            <div class="col-12 col-lg-6 d-flex flex-column align-items-start justify-content-between card m-2 p-3 order-2" style="height: 75vh;">
                <h2 class="card-title text-primary mb-4">Szukaj użytkownika</h2>
                <label for="search-user">ID użytkownika/Imię/Nazwisko</label>
                <input type="text" class="form-control mb-3" id="search-user" value='' aria-describedby="basic-addon3">
                <div class="w-100" id="principals">
                    @foreach ($users as $user)
                    <div data-user='{{$user->id}}' class="card flex-row align-items-center py-4 my-3 mx-2 w-100 profile" style="cursor: pointer;">
                        <img src="/img/avatar.jpg" class="avatarImage mx-3">
                        <p class="mb-0 text-primary" data-user='{{$user->id}}'>{{$user->name}}; ID: {{$user->id}}</p>
                    </div>
                    @endforeach

                </div>
            </div>

            <div class="col-12 col-lg-5 d-flex justify-content-center card m-2 p-3 order-1 order-lg-3">
                <div class="d-flex flex-column justify-content-around" id="detailOffDiv">
                    <h2 class="card-title text-primary text-center mb-4">Liczba Użytkowników</h2>
                    <p class="text-center">{{count($users)}}</p>
                </div>

                <div class="d-none flex-column h-75" id="detailOnDiv">

                    <div class="d-flex h-25 align-items-center mb-4">
                        <img src="/img/avatar.jpg" class="mainAvatarImage mr-3" width="64px">
                        <div>
                            <h4 class="text-primary mb-0" id="detailName"></h4>
                            <p class="mb-0">
                                Konto stworzone
                                <span id="detailDate"></span>
                                ; ID:
                                <span id="detailID"></span>
                            </p>
                        </div>
                    </div>

                    <div class="mt-1 mb-3">
                        <h3 class="text-primary">Ostatnie zlecenia</h3>
                        <p id="detailDescription"></p>
                    </div>
                    <div class="mt-1 mb-5">
                        <h3 class="text-primary">Statystyki użytkownika</h3>
                        <p class="mb-0">Ilość zrealizowanych zleceń: <span id="detailNumberOfOrder"></span></p>
                        <p class="mb-0">Ilość stworzonych zleceń: <span id="detailCreatedAnnouncements"></span></p>
                        <p class="mb-0">Ostatnia ocena użytkownika: <span id="detailLastRating"></span></p>
                        <p class="mb-0">Średnia ocena użytkownika: <span id="detailAvgRating"></span></p>
                    </div>
                    <p class="mt-3 mb-0">Końcowa data blokady konta:</p>
                    <div class="d-flex flex-row">
                        <form action='/user/ban' method="POST" class=" w-100">
                            @csrf
                            <input type="date" name='date' id='ban-user-date' class="form-control w-100" required />
                            <input type="text" name='user' id='ban-user-id' hidden />
                            <button class="btn btn-primary w-100">Zbanuj</button>
                        </form>
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