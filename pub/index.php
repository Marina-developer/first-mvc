<?php

use app\Core\Application;
use app\Core\Router;
use app\Core\Request;
use app\Models\User;
use app\Controllers\UserController;
use app\Controllers\HomeController;
use app\Controllers\AuthController;

$config = [
    'userClass' => User::class,
    'db' => [
        'dsn' => 'mysql:host=localhost;port=3306;dbname=webshop',
        'user' => 'root',
        'pass' => 'marina'
    ],
];

define('BP', dirname(__DIR__));
define('DS', DIRECTORY_SEPARATOR);

// Autoloader
spl_autoload_register(function ($class) {

    $filename = BP . DS . str_replace('\\', DS, $class) . '.php';

    if (file_exists($filename)) {
        include $filename;
    }
});

$app = new Application(BP . DS, $config);

$app->router->get('/', [HomeController::class, 'show']);

$app->router->get('/user', [UserController::class, 'register']);
$app->router->post('/user', [UserController::class, 'register']);

$app->router->get('/login', [AuthController::class, 'login']);
$app->router->post('/login', [AuthController::class, 'login']);

$app->router->get('/logout', [AuthController::class, 'logout']);

$app->router->get('/register', [AuthController::class, 'register']);
$app->router->post('/register', [AuthController::class, 'register']);

$app->router->get('/profile', [UserController::class, 'profile']);


$app->run();

