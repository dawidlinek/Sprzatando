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
                    @include('auth.navbar')
                <!-- </Navbar> -->

                <!-- <Form> -->
                <div
                    class="d-flex justify-content-center align-items-center"
                    style="min-height: 90%"
                >
                    <div class="p-1 p-lg-5 col-12 col-sm-8 col-lg-12 col-xl-9">
                        <h1 class="header text-center text-primary pb-3">
                            Dołącz do nas!
                        </h1>

                        <form>
                            <div class="form-group pb-0">
                                <div class="b-col col-10 mx-auto">
                                    <label for="FormControlInput1 col-offset"
                                        >Nazwa</label
                                    >
                                    <input
                                        type="text"
                                        class="form-control mb-4"
                                        id="FormControlInput1"
                                        placeholder="Nazwa użytkownika"
                                    />
                                </div>
                                <div class="b-col col-10 mx-auto">
                                    <label for="FormControlInput1 col-offset"
                                        >Email</label
                                    >
                                    <input
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
                                        <label for="FormControlInput2 "
                                            >Hasło</label
                                        >
                                    </div>
                                    <input
                                        type="password"
                                        class="form-control mb-4"
                                        id="FormControlInput2"
                                    />
                                </div>
                                <div class="b-col col-10 mx-auto">
                                    <div
                                        class="d-flex flex-row justify-content-between"
                                    >
                                        <label for="FormControlInput2 "
                                            >Powtórz hasło</label
                                        >
                                    </div>
                                    <input
                                        type="password"
                                        class="form-control mb-4"
                                        id="FormControlInput2"
                                    />
                                </div>
                            </div>

                            <div class="text-center col-10 mx-auto mt-5">
                                <button
                                    type="submit"
                                    class="btn input-block-level form-control center-block btn-primary"
                                >
                                    Zarejestruj się!
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
