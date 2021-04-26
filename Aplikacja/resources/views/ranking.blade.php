<!DOCTYPE html>
<html lang="pl">

<head>
    @include('components.head')
    <link rel="stylesheet" href="/css/ranking.css" />
    @PWA
</head>

<body class="bg-light">

    @include('components.navbar')
    <div class="w-100 d-flex align-items-center flex-column col-12">

        <h1 class="text-primary mt-5 mb-4">Najlepsi z najlepszych</h1>

        <div class="d-flex w-100 flex-lg-row flex-column align-items-center justify-content-center mb-5" id="podium">
            <div class="flex-fill card d-flex flex-column align-items-center mb-3 mx-3 col-lg-1 col-10 col-sm-8 p-3">
                <img class="m-1" src="https://tryumf.com/api/attachment/get/E1A1D522-60A3-4575-91EE-169AD179B79B/ImageIdent/csPhotos%7CPhotoMed%7CCA532C6C-B71B-4D00-BF91-0013A9918E80%7C5.png/Medal_stalowy_zloty_pierwsze_miejsce.png" height="100px" width="100px">
                <p class="mb-1">{{$users[0]['name']}}</p>
                <p>{{$users[0]['avg']}} {{str_repeat('⭐',round($users[0]['avg']))}}</p>
                <div class="liczba_zgloszen mb-3 bg-primary">
                    <p>{{$users[0]['jobs']}} zgłoszeń</p>
                </div>

            </div>
            <div class="flex-fill card d-flex flex-column align-items-center mt-3 mx-3 col-lg-1 col-10 col-sm-8 p-3">
                <img class="m-1" src=" https://tryumf.com/api/attachment/get/E1A1D522-60A3-4575-91EE-169AD179B79B/ImageIdent/csPhotos%7CPhotoMed%7C0D5C1385-B72D-4452-AD3A-7BB92FB72D28%7C3/Medal_zamak_srebrny_drugie_miejsce.png" height="100px" width="100px">
                <p class="mb-1">{{$users[1]['name']}}</p>
                <p>{{$users[1]['avg']}} {{str_repeat('⭐',round($users[1]['avg']))}}</p>
                <div class="liczba_zgloszen mb-3 bg-primary">
                    <p>{{$users[1]['jobs']}} zgłoszeń</p>
                </div>
            </div>
            <div class="flex-fill card d-flex flex-column align-items-center mt-5 mx-3 col-lg-1 col-10 col-sm-8 p-3">
                <img class="m-1" src="https://tryumf.com/api/attachment/get/E1A1D522-60A3-4575-91EE-169AD179B79B/ImageIdent/csPhotos%7CPhotoMed%7C3DAE345A-35A2-479F-930B-ADA2913889AF%7C3/Medal_stalowy_br%C4%85zowy_trzecie_miejsce.png" height="100px" width="100px">
                <p class="mb-1">{{$users[2]['name']}}</p>
                <p>{{$users[2]['avg']}} {{str_repeat('⭐',round($users[2]['avg']))}}</p>
                <div class="liczba_zgloszen mb-3 bg-primary">
                    <p>{{$users[2]['jobs']}} zgłoszeń</p>
                </div>
            </div>
        </div>
    </div>
    <div class="w-100 d-flex justify-content-center align-items-center ">
        <div class="p-5 pt-0 p-md-0 table-responsive">
            <table id="rankTable">
                <tr>
                    <th>Miejsce</th>
                    <th>Nazwa użytkownika</th>
                    <th>Liczba zgłoszeń</th>
                    <th>Ocena</th>
                </tr>

                @foreach ($users as $key=>$user)
                @if($key<3) @continue @endif
                <tr class="spaceRow">
                </tr>
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$user['name']}}</td>
                    <td>
                        <div class="liczba_zgloszen bg-primary">
                            <p>{{$user['jobs']}} zgłoszeń</p>
                        </div>
                    </td>
                    <td style="text-align: right;">{{$user['avg']}} {{str_repeat('⭐',round($user['avg']))}}</td>
                </tr>
                @endforeach
                
                <tr class="spaceRow"></tr>
            </table>
        </div>
    </div>
    @include('components.footer')
    <script src="/bootstrap/js/bootstrap.bundle.min.js"></script>