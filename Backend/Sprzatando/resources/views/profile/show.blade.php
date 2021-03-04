@extends('dashboard.main_layout')

@section('main')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 bg-light">
    <div class="d-flex justify-content-start flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
        <div class="row w-100 match-height">

            <div class="col-lg col-lg-6">
                <div class="card ">
                    <div class="card-body d-flex flex-column align-items-start justify-content-between">
                        <h2 class="card-title text-primary mb-4">Zmień dane konta</h2>
                        @include('auth.errors',["errors"=>$errors])
                        @if (session('status'))
                        <div class="alert alert-success mb-2 mt-4 col-10 mx-auto border-0 p-2" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        {{-- <img src="..." class="card-img" width="50" height="50px" alt="BRAK ZDJĘCIA"> --}}
                        <form class="w-100" method="POST" action="{{route('user.update')}}" >
                            @csrf
                            <label for="FormControlInput1 col-offset">Nazwa</label>
                            <input type="text" name='name' required value="{{Auth::user()->name}}" class="form-control mb-4" />
                            <label for="FormControlInput1 col-offset">Email</label>
                            <input type="email" name='email' required value="{{Auth::user()->email}}" class="form-control mb-4"
                                placeholder="twój@adres.com" />
                                <div class="w-100 d-flex justify-content-end mt-2">
                                    <button class="btn btn-primary">Zapisz zmiany</button>
                                </div>
                            </form>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-6 mt-3 mt-lg-0">
                <div class="card">
                    <div class="card-body d-flex flex-column align-items-start justify-content-between">
                        <h2 class="card-title text-primary mb-4">Zmień hasło</h2>

                        <form class="w-100">
                            <label for="FormControlInput1 col-offset">Aktualne hasło</label>
                            <input type="password" class="form-control mb-4" id="FormControlInput1" />
                            <label for="FormControlInput1 col-offset">Nowe hasło</label>
                            <input type="password" class="form-control mb-4" id="FormControlInput1" />
                            <label for="FormControlInput1 col-offset">Powtórz hasło</label>
                            <input type="password" class="form-control mb-4" id="FormControlInput1" />
                        </form>
                        <div class="w-100 d-flex justify-content-end mt-2">
                        <a href="#" class="btn btn-primary">Zmień hasło</a>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</main>
@endsection