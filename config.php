<?php

namespace app\Controllers;

use app\Models\User;

config =
    ['userClass' => User::class,
        'db' => [
            'dsn' => 'mysql:host=localhost;port=3306;dbname=webshop',
            'user' => 'root',
            'pass' => 'marina'
        ],
    ];
?>