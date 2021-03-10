<?php return[
'unique' => 'Nazwa użytkownika i email musi być unikatowa',
'confirmed'=>"Hasła muszą się zgadzać",
'min' => [
    'numeric' => 'Pole :attribute musi mieć co najmniej :min znaków.',
    'file' => 'The :attribute must be at least :min kilobytes.',
    'string' => 'Musi mieć conajmniej 8 znków.',
    'array' => 'The :attribute must have at least :min items.',
],
'max'=>[
    "string"=>"Wartość pola :attribute jest za długa",
],
'numeric'=>"Pole musi być liczbą",
'exists'=>"Podana wartość nie instnieje",
'required' => 'Pole :attribute jest wymagane.',
'attributes' => ['name'=>"nazwa",'old_password'=>"Stare hasło",'confirmed'=>"Powtórz hasło",'password'=>"Hasło",'title'=>"Tytuł",'description'=>"Opis",'price'=>"Cena",'localization'=>"Lokalizacja",'categories'=>"Kategorii",'expiring_at'=>'Czas ważności'],
];
?>