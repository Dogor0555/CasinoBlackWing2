<?php

return [
    'attributes' => [
        'password' => 'contraseña',
        'user_photo' => 'foto de usuario',
    ],
    'custom' => [
        'password' => [
            'min' => 'La :attribute debe tener al menos :min caracteres.',
            'regex' => 'La :attribute debe contener al menos una letra, un número y un carácter especial.',
            'confirmed' => 'La confirmación de :attribute no coincide.',
        ],
        'email' => [
            'unique' => 'El correo electrónico ya está registrado en el sistema. Por favor, utiliza otro correo electrónico.',
        ],
        'user_photo' => [
            'image' => 'La :attribute debe ser una imagen válida.',
            'mimes' => 'La :attribute debe ser del tipo: :values.',
            'max' => 'La :attribute no puede ser más grande que :max kilobytes.',
        ],
    ],
];
