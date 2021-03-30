<div class="card d-flex w-100 mt-3">
    <div class="row w-100 mx-auto">  
        <div class="col-md-auto rounded" style="background-image: url(/uploads/{{$announcement->img1}}); background-position: center center; background-size: cover; min-height: 200px; min-width: 200px;">
            &nbsp;
        </div>
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
                        @if($user??false)
                        <div class="w-100">
                            <p class="card-text">
                                <span class="badge {{$announcement->status}} rounded">{{__($announcement->status)}}</span>
                            </p>
                        </div>
                        @endif

                        <p class="card-text p-3">{{$announcement->description}} </p>
                    </div>

                </div>

                <div class="col-xl-4 col-lg-5 col-md-6 p-3 d-flex flex-column justify-content-between" style="text-align: right;">
                    <div class="b-row d-md-block d-none p-3" style="padding-top: 0 !important;">
                        <p><small class="text-muted overflow-wrap">{{$announcement->localization}}</small></p>
                    </div>
                    <div class="b-row d-flex p-3">
                        @if($user??false)

                        @if($announcement->status=='active')
                        <a class="btn btn-primary w-100 text-nowrap text-white rounded" href="{{ route('announcement.edit', $announcement->id) }}">Edytuj</a>
                        @else 
                        <a class="btn btn-primary w-100 text-nowrap bg-gray text-white rounded" href="{{ route('announcement.edit', $announcement->id) }}">Podgląd</a>
                        @endif

                        @else 
                        <a class="btn btn-primary w-100 text-nowrap bg-gray text-white rounded" href="#">Pokaż</a>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>