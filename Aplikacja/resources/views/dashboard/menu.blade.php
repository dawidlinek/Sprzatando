<ul class="nav flex-column">
    <li class="nav-item m-1">

        <a class="nav-link rounded @if(request()->route()->uri=='dashboard/announcement/create') bg-primary text-white @endif" href="{{route('announcement.create')}}">
            <span data-feather="home"></span>
            Dodaj ogłoszenie         </a>
    </li>
    <li class="nav-item m-1">
        <a class="nav-link rounded @if(request()->route()->uri=='dashboard/announcement') bg-primary text-white @endif" href="{{route('announcement.index')}}">
            <span data-feather="home"></span>
            Moje ogłoszenia
        </a>
    </li>
    <li class="nav-item m-1">
        <a class="nav-link rounded @if(request()->is('dashboard/zlecenia')) bg-primary text-white @endif" href="/dashboard/zlecenia">
            <span data-feather="home"></span>
            Moje zlecenia
        </a>
    </li>
    <li class="nav-item m-1">
        <a class="nav-link rounded @if(request()->route()->uri=='user/profile') bg-primary text-white @endif" href="/user/profile">
            <span data-feather="file"></span>
            Ustawienia
        </a>
    </li>
</ul>