<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/css/fonts.css" />
    <link rel="stylesheet" href="/css/app.css" />
    <link rel="stylesheet" href="/css/welcome.css" />
    <link rel="stylesheet" href="/css/ranking.css" />
    <title>Sprzatnij me:D</title>
</head>

<body class="bg-light">

    @include('components.navbar')
<div class="w-100 d-flex align-items-center flex-column" style="height: 45vh;">
    <h1 class="primary-text mt-3 mb-5">Najlepsi z najlepszych</h1>
    <div class="d-flex w-100 align-items-center justify-content-center mb-5" id="podium">
        <div class="flex-fill card d-flex flex-column align-items-center mt-5 mx-3">
            <img src="https://tryumf.com/api/attachment/get/E1A1D522-60A3-4575-91EE-169AD179B79B/ImageIdent/csPhotos%7CPhotoMed%7C0D5C1385-B72D-4452-AD3A-7BB92FB72D28%7C3/Medal_zamak_srebrny_drugie_miejsce.png" height="100px" width="100px">
            <p>2</p>
            <p>Krystian Śmietana</p>
            <p>4.8⭐⭐⭐⭐⭐</p>
            <div class="liczba_zgloszen mb-3 bg-primary" >
                <p>420 zgłoszeń</p>
            </div>
        </div>
        <div class="flex-fill card d-flex flex-column align-items-center mx-3">
            <img src="https://tryumf.com/api/attachment/get/E1A1D522-60A3-4575-91EE-169AD179B79B/ImageIdent/csPhotos%7CPhotoMed%7CCA532C6C-B71B-4D00-BF91-0013A9918E80%7C5.png/Medal_stalowy_zloty_pierwsze_miejsce.png" height="100px" width="100px">
            <p>1</p>
            <p>Janusz Kromka</p>
            <p>4.5 ⭐⭐⭐⭐</p>
            <div class="liczba_zgloszen mb-3 bg-primary" >
                <p>520 zgłoszeń</p>
            </div>
        
        </div>
        <div class="flex-fill card d-flex flex-column align-items-center mt-5 mx-3">
            <img src="https://tryumf.com/api/attachment/get/E1A1D522-60A3-4575-91EE-169AD179B79B/ImageIdent/csPhotos%7CPhotoMed%7C3DAE345A-35A2-479F-930B-ADA2913889AF%7C3/Medal_stalowy_br%C4%85zowy_trzecie_miejsce.png" height="100px" width="100px">
            <p>3</p>
            <p>Paweł Boszka</p>
            <p>4.5⭐⭐⭐⭐</p>
            <div class="liczba_zgloszen mb-3 bg-primary" >
                <p>320 zgłoszeń</p>
            </div>
        </div>
    </div>
</div>
<div class="w-100 d-flex justify-content-center align-items-center mt-5">
    <table id="rankTable">
        <tr>
            <th>Miejsce</th>
            <th>Nazwa użytkownika</th> 
            <th>Liczba zgłoszeń</th> 
            <th>Ocena</th>
        </tr>
        <tr class="spaceRow"></tr>
        <tr>
            <td>4</td>
            <td>Smith</td>
            <td>
                <div class="liczba_zgloszen bg-primary" >
                    <p>320 zgłoszeń</p>
                </div>
            </td>
            <td>5 ⭐⭐⭐⭐⭐</td>
        </tr>
        <tr class="spaceRow"></tr>
        <tr>
            <td>5</td>
            <td>Jackson</td>
            <td>
                <div class="liczba_zgloszen bg-primary" >
                    <p>320 zgłoszeń</p>
                </div>
            </td>
            <td>94 ⭐⭐⭐⭐⭐</td>
        </tr>
        <tr class="spaceRow"></tr>
        <tr>
            <td>6</td>
            <td>Doe</td>
            <td>
                <div class="liczba_zgloszen bg-primary" >
                    <p>320 zgłoszeń</p>
                </div>
            </td>
            <td>80 ⭐⭐⭐⭐⭐</td>
        </tr>
        <tr class="spaceRow"></tr>
        <tr>
            <td>7</td>
            <td>Doe</td>
            <td>
                <div class="liczba_zgloszen bg-primary" >
                    <p>320 zgłoszeń</p>
                </div>
            </td>
            <td>80 ⭐⭐⭐⭐⭐</td>
        </tr>
        <tr class="spaceRow"></tr>
        <tr>
            <td>8</td>
            <td>Doe</td>
            <td>
                <div class="liczba_zgloszen bg-primary" >
                    <p>320 zgłoszeń</p>
                </div>
            </td>
            <td>80 ⭐⭐⭐⭐⭐</td>
        </tr>
        <tr class="spaceRow"></tr>
        <tr>
            <td>9</td>
            <td>Doe</td>
            <td>
                <div class="liczba_zgloszen bg-primary" >
                    <p>320 zgłoszeń</p>
                </div>
            </td>
            <td>80 ⭐⭐⭐⭐⭐</td>
        </tr>
        <tr class="spaceRow"></tr>
        <tr>
            <td>10</td>
            <td>Doe</td>
            <td>
                <div class="liczba_zgloszen bg-primary" >
                    <p>320 zgłoszeń</p>
                </div>
            </td>
            <td>80 ⭐⭐⭐⭐⭐</td>
        </tr>
        <tr class="spaceRow"></tr>
    </table>
</div>