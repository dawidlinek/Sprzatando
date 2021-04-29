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
                <img class="m-1" src="/img/1 miejsce.png" height="100px" width="100px">
                <p class="mb-1">{{$users[0]['name']}}</p>
                <p>{{round($users[0]['avg'],1)}} {{str_repeat('⭐',round($users[0]['avg']))}}</p>
                <div class="liczba_zgloszen mb-3 bg-primary">
                    <p>oceniony {{$users[0]['jobs']}} @if(in_array($users[0]['jobs'],[1])) raz @else razy @endif</p>
                </div>

            </div>
            <div class="flex-fill card d-flex flex-column align-items-center mt-3 mx-3 col-lg-1 col-10 col-sm-8 p-3">
                <img class="m-1" src="/img/2 miejsce.png" height="100px" width="100px">
                <p class="mb-1">{{$users[1]['name']}}</p>
                <p>{{round($users[1]['avg'],1)}} {{str_repeat('⭐',round($users[1]['avg']))}}</p>
                <div class="liczba_zgloszen mb-3 bg-primary">
                    <p>oceniony {{$users[1]['jobs']}} @if(in_array($users[1]['jobs'],[1])) raz @else razy @endif</p>
                </div>
            </div>
            <div class="flex-fill card d-flex flex-column align-items-center mt-5 mx-3 col-lg-1 col-10 col-sm-8 p-3">
                <img class="m-1" src="/img/3 miejsce.png" height="100px" width="100px">
                <p class="mb-1">{{$users[2]['name']}}</p>
                <p>{{round($users[2]['avg'],1)}} {{str_repeat('⭐',round($users[2]['avg']))}}</p>
                <div class="liczba_zgloszen mb-3 bg-primary">
                    <p>oceniony {{$users[2]['jobs']}} @if(in_array($users[2]['jobs'],[1])) raz @else razy @endif</p>
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
                    <th>Ilość ocen</th>
                    <th>Średnia ocena</th>
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
                            <p>oceniony {{$user['jobs']}} @if(in_array($user['jobs'],[1])) raz @else razy @endif</p>
                        </div>
                    </td>
                    <td style="text-align: right;" class='text-nowrap'>{{round($user['avg'],1)}} {{str_repeat('⭐',round($user['avg']))}}</td>
                </tr>
                @endforeach

                <tr class="spaceRow"></tr>
            </table>
        </div>
    </div>
    @include('components.footer')
    <script src="/bootstrap/js/bootstrap.bundle.min.js"></script>
