@extends('dashboard.main_layout')

@section('main')

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 bg-light">
    @include('dashboard.status')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
        <!-- MAIN CONTENT START -->
        <div class="card w-100">
            <div class="card-body d-flex flex-column align-items-start justify-content-between">
                <div class="cart-title col-12">
                    <h2 class="text-primary mb-4">Zgłoszone ogłoszenia</h2>
                </div>
                @if(count($announcements)==0)
                Brak ogłoszeń
                @endif

                @foreach ($announcements as $announcement)
                    @include('components.announcement',['reported'=>true,'announcement'=>$announcement])
                @endforeach
            </div>
        </div>
    </div>
</main>
@endsection