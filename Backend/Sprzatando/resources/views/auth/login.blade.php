<!DOCTYPE html>
<html lang="pl">

<head>
    @include('auth.header')
</head>

<body>
    <div class="b-row d-flex flex-row" style="min-height: 100vh">
        @include('auth.slider')
        <!-- </Left column> -->

        <!-- <Right column> -->
        <div class="b-col col-12 col-lg-6 p-3 p-lg-5">
            <!-- <Navbar> -->
            @include('auth.navbar')
            <!-- </Navbar> -->

            <!-- <Form> -->
            <div class="d-flex justify-content-center align-items-center" style="min-height: 90%">
                <div class="p-1 p-lg-5 col-12 col-sm-8 col-lg-12 col-xl-9" style="max-width: 600px">
                    <h1 class="header text-center text-primary pb-3">
                        Witaj!
                    </h1>
                    <p class="mb-3 text-center text-gray pb-3">
                        Zaloguj się, aby skorzystać z jeszcze większej
                        palety możliwości!
                    </p>
                    @if (session('status'))
                    <div class="alert alert-success mb-2 mt-4 col-10 mx-auto border-0 p-2" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group pb-0">

                       
                        @include('auth.errors',["errors"=>$errors])
                        <div class="b-col col-10 mx-auto">
                            <label for="FormControlInput1 col-offset">Email</label>
                            <input name="email" value="{{ old('email') }}" required type="email" class="form-control mb-4" id="FormControlInput1" placeholder="twój@adres.com" />
                        </div>
                        <div class="b-col col-10 mx-auto">
                            <div class="d-flex flex-row justify-content-between">
                                <label for="FormControlInput2">Hasło</label>
                                <a href="{{ route('password.request') }}" style="text-decoration: none">Przywróć hasło</a>
                            </div>
                            <input name="password" required autocomplete="current-password" type="password" class="form-control mb-4" id="FormControlInput2" />
                        </div>
                    </div>

                    <div class="form-check pb-2 mt-0 mb-5 col-10 mx-auto">
                        <div class="b-col col-6">
                            <input name="remember" type="checkbox" class="form-check-input" id="Check1" />
                            <label class="form-check-label" for="Check1">Pamiętaj mnie</label>
                        </div>
                    </div>
                    <div class="text-center col-10 mx-auto">
                        <button type="submit" class="btn input-block-level form-control center-block btn-primary">
                            Zaloguj!
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <!-- </Form> -->
    </div>
    <!-- </Right column> -->
    </div>

    <script src="slider.js"></script>
    <script src="./bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>