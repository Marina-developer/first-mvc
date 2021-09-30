<?php

use app\Core\Application;
use app\Core\Database;
use app\Core\Router;
use app\Core\Request;
use app\Models\User;
use app\Controllers\UserController;
use app\Controllers\HomeController;
use app\Controllers\AuthController;


define('BP', dirname(__DIR__));
define('DS', DIRECTORY_SEPARATOR);
define('BPP',__DIR__);

$config = [
    'userClass' => User::class,
    'db' => [
        'dsn' => 'mysql:host=localhost;port=3306;dbname=webshop',
        'user' => 'root',
        'pass' => 'marina'
    ],
];

// Autoloader
spl_autoload_register(function ($class) {

    $filename = BPP . DS . str_replace('\\', DS, $class) . '.php';

    if (file_exists($filename)) {
        include $filename;
    }
});
$app = new Application( BPP . DS,  $config);

$app->db->applyMigrations();
