<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <link rel="stylesheet" href="/css/login/fonts.css" />
        <link rel="stylesheet" href="/css/login/style.css" />
        <link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css" />

        <title>Sprzatnij me:D</title>
    </head>

    <body>
        <div class="b-row d-flex flex-row" style="min-height: 100vh">
            <!-- <Left column> -->
            <div
                class="b-col col-6 vh-100 slider d-none d-lg-flex flex-column justify-content-around align-items-center"
            >
                <div
                    class="d-flex h-75 w-75 flex-column align-items-center justify-content-center"
                    style="user-select: none"
                >
                    <div id="heroImage" class="h-75 w-50 zIndex2">&nbsp;</div>
                    <img
                        src="/img/login/floor.png"
                        width="35%"
                        class="carpet zIndex1 img-fluid max-width: 45%; height:auto position-absolute"
                        draggable="false"
                    />
                    <p
                        id="description"
                        class="text-center w-100 zIndex2 m-3"
                        style="color: var(--tertiary); font-size: 22px"
                    >
                        Jako zalogowany użytkownik <br />
                        masz dostęp do większej palety funkcjonalności!
                    </p>
                </div>
                <div class="d-flex w-100 justify-content-center zIndex2">
                    <div
                        id="first-bar"
                        class="m-1 h-50 bg-primary"
                        style="width: 10%"
                    ></div>
                    <div
                        id="second-bar"
                        class="m-1 h-50"
                        style="background: var(--primary-opacity); width: 5%"
                    ></div>
                    <div
                        id="third-bar"
                        class="m-1 h-50"
                        style="background: var(--primary-opacity); width: 5%"
                    ></div>
                </div>
            </div>
            <!-- </Left column> -->

            <!-- <Right column> -->
            <div class="b-col col-12 col-lg-6 p-3 p-lg-5">
                <!-- <Navbar> -->
                <nav class="navbar navbar-light pb-3">
                    <a class="navbar-brand" href="#">
                        <img src="" width="50" height="50" alt="LOGO" />
                    </a>
                    <div class="d-flex justify-content-end">
                        <ul class="navbar-nav flex-row">
                            <li class="nav-item active">
                                <a class="nav-link" href="#">
                                    <span
                                        class="sr-only d-none d-lg-block text-primary"
                                        style="margin-right: 3rem"
                                        >Zaloguj się!</span
                                    >
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Rejestracja</a>
                            </li>
                        </ul>
                    </div>
                </nav>
                <!-- </Navbar> -->

                <!-- <Form> -->
                <div
                    class="d-flex justify-content-center align-items-center"
                    style="min-height: 90%"
                >
                    <div class="p-1 p-lg-5 col-12 col-sm-8 col-lg-12 col-xl-9">
                        <h1 class="header text-center text-primary pb-3">
                            Witaj!
                        </h1>
                        <p class="mb-3 text-center text-gray pb-3">
                            Zaloguj się, aby skorzystać z jeszcze większej
                            palety możliwości!
                        </p>
                        @if ($errors->any())
                        <div class="mb-4 font-medium text-sm text-green-600">
                            @foreach ($errors->all() as $error)
                <p class='text-red'>{{ $error }}</p>
            @endforeach
                        </div>
                    @endif
                        {{-- @if (session('status'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ session('status') }}
                        </div>
                    @endif --}}
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group pb-0">
                                <div class="b-col col-10 mx-auto">
                                    <label for="FormControlInput1 col-offset"
                                        >Email</label
                                    >
                                    <input
                                    name="email" :value="old('email')"
                                    required
                                        type="email"
                                        class="form-control mb-4"
                                        id="FormControlInput1"
                                        placeholder="twój@adres.com"
                                    />
                                </div>
                                <div class="b-col col-10 mx-auto">
                                    <div
                                        class="d-flex flex-row justify-content-between"
                                    >
                                        <label for="FormControlInput2"
                                            >Hasło</label
                                        >
                                        <a
                                        href="{{ route('password.request') }}"
                                            style="text-decoration: none"
                                            >Przywróć hasło</a
                                        >
                                    </div>
                                    <input
                                    name="password" required autocomplete="current-password"
                                        type="password"
                                        class="form-control mb-4"
                                        id="FormControlInput2"
                                    />
                                </div>
                            </div>

                            <div
                                class="form-check pb-2 mt-0 mb-5 col-10 mx-auto"
                            >
                                <div class="b-col col-6">
                                    <input
                                    name="remember" 
                                        type="checkbox"
                                        class="form-check-input"
                                        id="Check1"
                                    />
                                    <label class="form-check-label" for="Check1"
                                        >Pamiętaj mnie</label
                                    >
                                </div>
                            </div>
                            <div class="text-center col-10 mx-auto">
                                <button
                                    type="submit"
                                    class="btn input-block-level form-control center-block btn-primary"
                                >
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
