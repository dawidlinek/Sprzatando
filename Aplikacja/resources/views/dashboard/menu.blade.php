@auth
<ul class="nav flex-column">
    <li class="nav-item m-1">
        <a class="nav-link rounded @if(request()->route()->uri=='dashboard/announcement/create') bg-primary text-white @endif" href="{{route('announcement.create')}}">
            <span data-feather="home"></span>
            <x-feathericon-plus-circle class="@if(request()->route()->uri=='dashboard/announcement/create') text-white @else text-black @endif" style="margin-right: 6px;" />
            Dodaj ogłoszenie
        </a>
    </li>
    <li class="nav-item m-1">
        <a class="nav-link rounded @if(request()->route()->uri=='dashboard/announcement') bg-primary text-white @endif" href="{{route('announcement.index')}}">
            <span data-feather="home"></span>
            <x-feathericon-folder class="@if(request()->route()->uri=='dashboard/announcement') text-white @else text-black @endif" style="margin-right: 6px;" />
            Moje ogłoszenia
        </a>
    </li>
    <li class="nav-item m-1">
        <a class="nav-link rounded @if(request()->is('dashboard/zlecenia')) bg-primary text-white @endif" href="/dashboard/zlecenia">
            <span data-feather="home"></span>
            <x-feathericon-tool class="@if(request()->is('dashboard/zlecenia')) text-white @else text-black @endif" style="margin-right: 6px;" />
            Moje zlecenia
        </a>
    </li>
    @if(auth()->user()->admin())
    <li class="nav-item m-1">
        <a class="nav-link rounded @if(request()->is('dashboard/reported')) bg-primary text-white @endif" href="/dashboard/reported">
            <span data-feather="home"></span>
            <x-feathericon-flag class="@if(request()->is('dashboard/reported')) text-white @else text-black @endif" style="margin-right: 6px;" />
            Zgłoszone
        </a>
    </li>
    <li class="nav-item m-1">
        <a class="nav-link rounded @if(request()->is('dashboard/users')) bg-primary text-white @endif" href="/dashboard/users">
            <span data-feather="home"></span>
            <x-feathericon-user class="@if(request()->is('dashboard/users')) text-white @else text-black @endif" style="margin-right: 6px;" />
            Użytkownicy
        </a>
    </li>
    @endif
    <li class="nav-item m-1">
        <a class="nav-link rounded @if(request()->route()->uri=='user/profile') bg-primary text-white @endif" href="/user/profile">
            <span data-feather="file"></span>
            <x-feathericon-settings class="@if(request()->is('user/users')) text-white @else text-black @endif" style="margin-right: 6px;" />
            Ustawienia
        </a>
    </li>
</ul>
@endauth


