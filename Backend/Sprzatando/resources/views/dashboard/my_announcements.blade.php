@extends('dashboard.main_layout')

@section('main')

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 bg-light">
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

                
                               
                    


                                {{-- <div class="card d-flex w-100 mt-3">
                                    <div class="row w-100 mx-auto"> --}}
                                        {{-- <div class="col-md-2 rounded" style="background-image: url({{$announcement->main_image}}); background-position: center center; background-size: cover; min-height: 200px;">
                                            &nbsp;
                                        </div>
                                        <div class="col-md-8 col-sm-8">
                                            <div class="card-body">
                                                <div class="row col-12">
                                                    <div class="col-lg-6">
                                                        <h5 class="card-title text-primary text-nowrap">{{$announcement->title}}</h5>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <p class="card-text nowrap d-sm-flex"><small class="text-muted d-md-none justify-content-start">{{$announcement->localization}}</small><small class="text-muted d-flex justify-content-around">{{$announcement->price}} zł</small>
                                                        </p>

                                                    </div>
                                                </div>
                                                <div class="w-100">
                                                    <p class="card-text">
                                                        <b-badge><small class="text-danger">b-badge {{$announcement->status}}</small></b-badge>
                                                    </p>
                                                </div> --}}

                                                <div class="card d-flex w-100 mt-3">
                                                    <div class="row w-100 mx-auto">
                                                        <div class="col-md-2 rounded" style="background-image: url({{$announcement->main_image}}); background-position: center center; background-size: cover; min-height: 200px;">
                                                            &nbsp;
                                                        </div>
                                                        <div class="col-md-8 col-sm-8">
                                                            <div class="card-body">
                                                                <div class="row col-12">
                                                                    <div class="col-lg-6">
                                                                        <h5 class="card-title text-primary text-nowrap">{{$announcement->title}}</h5>
                                                                    </div>
                                                                    <div class="col-lg-4">
                                                                        <p class="card-text nowrap d-sm-flex"><small class="text-muted d-md-none justify-content-start">{{$announcement->localization}}</small><small class="text-muted d-flex justify-content-around">{{$announcement->price}} zł</small>
                                                                        </p>

                                                                    </div>
                                                                </div>
                                                                <div class="w-100">
                                                                    <p class="card-text">
                                                                        <b-badge><small class="text-danger">b-badge {{$announcement->status}}</small></b-badge>
                                                                    </p>
                                                                </div>

                                                                <p class="card-text">{{$announcement->description}} </p>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2 p-4">
                                                            <div class="b-row d-md-block d-none">
                                                                <p><small class="text-muted overflow-wrap">{{$announcement->localization}}</small></p>
                                                            </div>
                                                            <div class="b-row d-flex align-text-center p-3">
                                                                <button class="btn btn-primary w-100 text-nowrap text-white" href='/announcement/{{$announcement->id}}'>Edytuj</button>
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