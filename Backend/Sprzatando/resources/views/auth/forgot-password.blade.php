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
                        Przypomnij hasło
                    </h1>
                    <p class="mb-3 text-center text-gray">
                        Podaj swój adres e-mail, na który wyślemy link resetujący hasło
                    </p>
                    @if (session('status'))
                    <div class="alert alert-success mb-2 mt-4 col-10 mx-auto border-0 p-2" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    @include('auth.errors',["errors"=>$errors])

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="form-group pb-0">
                            <div class="b-col col-10 mx-auto">
                                <label for="FormControlInput1 col-offset">Email</label>
                                <input name="email" value="{{old('email')}}" required autofocus type="email" class="form-control mb-4" id="FormControlInput1" placeholder="twój@adres.com" />
                            </div>

                        </div>


                        <div class="text-center col-10 mx-auto">
                            <button type="submit" class="btn input-block-level form-control center-block btn-primary">
                                Wyślij!
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
    <script src="/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

        <script src="slider.js"></script>
        {{-- <script src="./bootstrap/js/bootstrap.bundle.min.js"></script> --}}
    </body>
</html>
