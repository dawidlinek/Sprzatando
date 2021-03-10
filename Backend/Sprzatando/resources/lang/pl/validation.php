<?php return[
'unique' => 'Nazwa użytkownika i email musi być unikatowa',
'confirmed'=>"Hasła muszą się zgadzać",
'min' => [
    'numeric' => 'The :attribute must be at least :min.',
    'file' => 'The :attribute must be at least :min kilobytes.',
    'string' => 'Musi mieć conajmniej 8 znków.',
    'array' => 'The :attribute must have at least :min items.',
],
'max'=>[
    "string"=>"Wartość pola :attribute jest za długa",
],
'exists'=>"Podana wartość nie instnieje",
'required' => 'Pole :attribute jest wymagane.',
'attributes' => ['name'=>"nazwa",'old_password'=>"Stare hasło",'confirmed'=>"Powtórz hasło",'password'=>"Hasło",'title'=>"Tytuł",'description'=>"Opis",'categories'=>"Kategorii"],
];
?>