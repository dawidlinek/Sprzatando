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
    "string"=>"Nazwa jest za długa",
],
'required' => 'Pole :attribute jest wymagane.',
'attributes' => ['name'=>"nazwa",'old_password'=>"Stare hasło",'confirmed'=>"Powtórz hasło",'password'=>"Hasło"],
];
?>