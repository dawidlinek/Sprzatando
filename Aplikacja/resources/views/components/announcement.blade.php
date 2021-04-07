<div class="card d-flex w-100 mt-3">
    <div class="row w-100 mx-auto">
        <div class="card-main-img-1 rounded @if($search??false) col-xl-auto @else col-md-auto @endif" style="background-image: url(/uploads/{{$announcement->img1??'placeholder.jpg'}}); background-position: center center; background-size: cover; min-height: 200px; min-width: 200px;">
            &nbsp;
        </div>
        <div class="@if($search??false) xlw100m200px @else mdw100m200px @endif">

            <div class="row d-flex h-100 @if($search??false) justify-content-xl-between @else justify-content-md-between @endif">

                <div class="col-xl-8 col-sm-12 p-3 pb-0 @if($search??false) col-xl-6 pb-xl-3 @else col-lg-7 col-md-6 pb-md-3 @endif">

                    <div class="row d-flex justify-content-between h-100">
                        <div>
                            <div class="col-12 d-flex flex-column @if($search??false) flex-xl-row @else flex-md-row @endif">
                                <div class="w-100 d-flex justify-content-between">
                                    <h5 class="card-main-title card-title text-primary">{{$announcement->title??'Title'}}</h5>
                                    <h5 class="m-0 text-nowrap text-primary d-block card-main-price @if($search??false) d-xl-none @else d-md-none @endif" style="padding-left: 1rem;">{{$announcement->price??'Price'}} zł</h5>
                                </div>
                            </div>

                            @if($user??false)
                            <div class="col-12">
                                <p class="card-text">
                                    <span class="badge {{$announcement->status??''}} rounded">{{__($announcement->status??'Status')}}</span>
                                </p>
                            </div>
                            @endif

                            <div class="col-12 mt-3">
                                <p class="card-main-desc card-text">{{strlen($announcement->description??'Description')>125?substr($announcement->description??'Description', 0, 125) . "..." : $announcement->description??'Description'}} </p>
                            </div>
                        </div>


                        <div class="col-12 d-flex align-items-end">
                            <p class="m-0"><small class="card-main-localization overflow-wrap" style="font-size: 12px;">{{$announcement->localization??'Localization'}}</small></p>
                        </div>
                    </div>

                </div>

                <div class="col-xl-4 p-3 d-flex flex-column justify-content-between @if($search??false)  @else col-lg-5 col-md-6 @endif" style="text-align: right;">
                    <div class="d-none @if($search??false) d-xl-block @else d-md-block @endif">
                        <h5 class="m-0 text-primary card-main-price">{{$announcement->price??"Price"}} zł</h5>
                    </div>
                    <div class="b-row d-flex">
                        @if($user??false)

                        @if($announcement->status=='active')
                        <a class="btn btn-primary w-100 text-nowrap text-white rounded" href="{{ route('announcement.edit', $announcement->id??"0") }}">Edytuj</a>
                        @else
                        <a class="btn btn-primary w-100 text-nowrap bg-gray text-white rounded" href="{{ route('announcement.edit', $announcement->id??"0") }}">Podgląd</a>
                        @endif

                        @else
                        <a class="card-main-a-show btn btn-primary w-100 text-nowrap bg-gray text-white rounded" href="{{route('singleOffer', $announcement->id??"0")}}">Pokaż</a>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>