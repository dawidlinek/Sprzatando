@extends('dashboard.main_layout')

@section('main')

<main class="col-md-9 ms-sm-auto col-xl-10 px-md-4 bg-light">
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
                    @include('components.announcement',['user'=>true])
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