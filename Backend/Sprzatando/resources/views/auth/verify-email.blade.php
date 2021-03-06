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
                <div class="p-1 p-lg-5 col-12 col-sm-8 col-lg-12" style="max-width: 600px">
                    <h1 class="header text-center text-primary pb-3 text-nowrap">
                        Dziękujemy za rejestrację!
                    </h1>
                    <p class="mb-3 text-center text-gray pb-3">
                        Zanim zaczniemy, czy mógłbyś/mogłabyś zweryfikować swój adres e-mail
                        poprzez
                        kliknięcie w link, który właśnie wysłaliśmy na twój adres? Jeśli nie otrzymałeś żadnej wiadomości
                        e-mail
                        kliknij poniżej, na podany adres wyślemy nową wiadomość z linkiem do weryfikacji konta. </p>
                    {{-- @if (session('status')) --}}
                    @if (session('message'))

                    <div class="alert alert-success mb-2 mt-4 col-10 mx-auto border-0 p-2" role="alert">
                        Nowy email z linkiem weryfikacyjnym został wysłany na twój adres email.
                    </div>
                    @endif

                    <form method="POST" action="{{ route('verification.send') }}">
                        @csrf

                        <button type="submit" role="button" class="btn btn-group-lg input-block-level block-center form-control btn-primary">
                            Wyślij ponownie!
                        </button>

                    </form>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" role="button" class="btn btn-group-lg input-block-level block-center form-control">
                            Wyloguj się
                        </button>
                    </form>
                </div>


                <!-- </Form> -->
            </div>
            <!-- </Right column> -->
        </div>

        <script src="slider.js"></script>
        <script src="/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>