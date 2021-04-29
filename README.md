## Sprzatando

Platforma łącząca ludzi posiadający srogie hacjendy z ludźmi mającymi ręce i minimum zdolności manualnych, żeby posprzątać.
<br>
<br>

## Design

Projekt graficzny został oparty na programie Adobe Xd, jest on dostępny pod tym linkiem: <br>
https://xd.adobe.com/view/f8812adf-6d46-4401-b9bb-5ef1619719e8-add2/specs/
<br>

## Struktura plików

```
├─ | Aplikacja | - Właściwa aplikacja, postawiona i utrzymywana w laravelu.
│
├─ | Bazy danych | - Schematy i pliki baz danych.
│
├─ | Design | - Materiały graficzne wykorzystane na stronie oraz design.
│
├─ | Prototypy | - Pliki napisane bez integracji backendowej, pierwotne prototypy w czystym htmlu i css
│
└─ Plik excel - Plik z wymaganiami odnośnie projektu
```

<br>

## Instalacja

Pamiętajmy o skonfigurowaniu pliku env. 
```bash
cd Aplikacja
npm install
composer install
php artisan migrate
```

<br>

## Uruchomienie projektu

```bash
cd Aplikacja
php artisan serve
```

Do poprawnego działania projektu wymagany jest plik .env. Przykładowy plik znajduje się pod nazwą .env.example. Wystarczy zmienić dane dostępowe do bazy danych oraz zmienić nazwę na .env
<br>
