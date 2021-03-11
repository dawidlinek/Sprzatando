@extends('dashboard.main_layout')

@section('main')

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 bg-light">
    @include('dashboard.status')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
        <!-- MAIN CONTENT START -->
        <div class="card w-100">
            <div class="card-body d-flex flex-column align-items-start justify-content-between">
                <div class="cart-title col-12">
                    <h2 class="text-primary mb-4">Moje ogłoszenia</h2>
                </div>
                @if(count($announcements)==0)
                Brak ogłoszeń
                @endif
                <!-- POJEDYNCZE OGŁOSZENIE -->
                @foreach ($announcements as $announcement)
                <div class="card d-flex w-100 mt-3">
                    <div class="row w-100 mx-auto">

                        <!-- <Image> -->
                        <div class="col-md-auto rounded" style="background-image: url(/uploads/{{$announcement->img1}}); background-position: center center; background-size: cover; min-height: 200px; min-width: 200px;">
                            &nbsp;
                        </div>
                        <!-- </Image> -->


                        <!-- w100m200px -> width: 100% - 200px (image width) -->
                        <div class="w100m200px">

                            <div class="row d-flex justify-content-md-between h-100">

                                <div class="col-xl-8 col-lg-7 col-md-6 col-sm-12">

                                    <div class="row p-3">

                                        <div class="col-12 d-flex flex-column flex-md-row">
                                            <div class="w-auto">
                                                <h5 class="card-title text-primary">{{$announcement->title}}</h5>
                                            </div>
                                            <div>
                                                <p class="card-text nowrap d-sm-flex">
                                                    <small class="text-muted d-md-none">{{$announcement->localization}}</small>
                                                    <small class="text-muted text-nowrap" style="margin-left: 1rem;">{{$announcement->price}} zł</small>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="w-100">
                                            <p class="card-text">
                                                <span class="badge {{$announcement->status}} rounded">{{__($announcement->status)}}</span>
                                            </p>
                                        </div>

                                        <p class="card-text p-3">{{$announcement->description}} </p>
                                    </div>

                                </div>

                                <div class="col-xl-4 col-lg-5 col-md-6 p-3 d-flex flex-column justify-content-between" style="text-align: right;">
                                    <div class="b-row d-md-block d-none p-3" style="padding-top: 0 !important;">
                                        <p><small class="text-muted overflow-wrap">{{$announcement->localization}}</small></p>
                                    </div>
                                    <div class="b-row d-flex p-3">
                                        @if($announcement->status=='active')
                                        <a class="btn btn-primary w-100 text-nowrap text-white rounded" href="{{ route('announcement.edit', $announcement->id) }}">Edytuj</a>
                                        @else 
                                        <a class="btn btn-primary w-100 text-nowrap bg-gray text-white rounded" href="{{ route('announcement.edit', $announcement->id) }}">Podgląd</a>
                                        @endif
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- POJEDYNCZE OGŁOSZENIE END -->

                @endforeach
            </div>
        </div>
    </div>


    {{-- <div class="fixed-bottom offset-md-2 p-4">
                                        <nav aria-label="Strony">
                                            <ul class="pagination justify-content-center">
                                                <li class="page-item disabled">
                                                    <a class="page-link" href="#" tabindex="-1">Poprzednia</a>
                                                </li>
                                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                <li class="page-item">
                                                    <a class="page-link" href="#">Następna</a>
                                                </li>
                                            </ul>
                                        </nav>
                                        <!-- PAGINATION END -->
                                    </div> --}}

    <!-- MAIN CONTENT END -->
    <!-- PAGINATION START -->

</main>
@endsection