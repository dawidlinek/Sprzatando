<!DOCTYPE html>
<html lang="pl">

<head>

    @include('auth.header')

</head>

<body>
    <div class="b-row d-flex flex-row" style="min-height: 100vh">
        <!-- <Left column> -->
        @include('auth.slider')
        <!-- </Left column> -->

        <!-- <Right column> -->
        <div class="b-col col-12 col-lg-6 p-3 p-lg-5">
            <!-- <Navbar> -->
            @include('auth.navbar',['route'=>""])
            <!-- </Navbar> -->

            <!-- <Form> -->
            <div class="d-flex justify-content-center align-items-center" style="min-height: 90%">
                <div class="p-1 p-lg-5 col-12 col-sm-8 col-lg-12" style="max-width: 600px;">
                    <h1 class="header text-nowrap text-center text-primary pb-4">
                        Zmiana hasła
                    </h1>
                    <p class="mb-3 text-center text-gray">
                        Zmień hasło dostępu do konta!
                    </p>
                    @if (session('status'))
                    <div class="alert alert-success mb-2 mt-4 col-10 mx-auto border-0 p-2" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    @include('auth.errors',["errors"=>$errors])

                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $request->route('token') }}">
                        <div class="b-col col-10 mx-auto">
                            <div class="d-flex flex-row justify-content-between">
                                <label for="FormControlInput2 ">Email</label>
                            </div>
                            <input name="email" value="{{$request->email}}" required autofocus type="email" class="form-control mb-4" id="FormControlInput2" />
                        </div>
                        <div class="b-col col-10 mx-auto">
                            <div class="d-flex flex-row justify-content-between">
                                <label for="FormControlInput2 ">Nowe hasło</label>
                            </div>
                            <input name="password" required autocomplete="new-password" type="password" class="form-control mb-4" id="FormControlInput2" />
                        </div>
                        <div class="b-col col-10 mx-auto">
                            <div class="d-flex flex-row justify-content-between">
                                <label for="FormControlInput2 ">Powtórz hasło</label>
                            </div>
                            <input name="password_confirmation" required autocomplete="new-password" type="password" class="form-control mb-4" id="FormControlInput2" />
                        </div>
                        <div class="text-center col-10 mx-auto mt-5">
                            <button type="submit" class="btn input-block-level form-control center-block btn-primary">
                                Zmień!
                            </button>
                        </div>
                </div>


            </div>



            </form>
        </div>
    </div>
    <!-- </Form> -->
    </div>
    <!-- </Right column> -->
    </div>

    <script src="slider.js"></script>
    <script src="/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>