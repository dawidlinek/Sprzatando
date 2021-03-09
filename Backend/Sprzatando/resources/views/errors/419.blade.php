<!DOCTYPE html>
<html lang="pl">
    @include('errors.header')
<body style="height: 100vh; width: 100vw;">
     <main class="col-md-12 ms-sm-auto col-lg-12 px-md-4 bg-light bg-light h-100 w-100 d-flex align-items-center justify-content-center text-center" >
        <div class="card w-75 h-75 d-flex flex-column align-items-center justify-content-center">
        <h1 style="font-size: 80px;"><span id="firstNum">4</span><span id="secondNum">1</span><span id="thirdNum">9</span></h1>
        <h2 class="mt-3">Strona wygasła</h2>
        <h4 class="mt-3">Niestety strona, którą chcesz odwiedzić wygasła. <br />
            Spróbuj odżwieżyć stronę za pomocą ctrl+f5 lub wyczyścić ciasteczka.
        </h4>
        <h5 class="mt-3">W ostateczności przejdź do <a href="https://sprzatnij.me/" class="fst-italic text-decoration-none text-dark">sprzatnij.me</a> i wybierz nowy adres URL
        </h5>
    </div>
     </main>

     @include('errors.footer')
</body>

</html>