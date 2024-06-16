<?php

use App\Config\Router;
use App\Controller\BookController;
use App\Controller\AuthController;
use App\Middleware\MustLoginMiddleware;

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../app/Config/Constants.php';

//Books
Router::add('GET', '/books', [BookController::class, 'index'], [MustLoginMiddleware::class]);
Router::add('GET', '/books/create', [BookController::class, 'create'], [MustLoginMiddleware::class]);
Router::add('POST', '/books/store', [BookController::class, 'store'], [MustLoginMiddleware::class]);
Router::add('GET', '/books/edit/{id}', [BookController::class, 'edit'], [MustLoginMiddleware::class]);
Router::add('POST', '/books/update/{id}', [BookController::class, 'update'], [MustLoginMiddleware::class]);
Router::add('GET', '/books/delete/{id}', [BookController::class, 'delete'], [MustLoginMiddleware::class]);
//Auth
Router::add('GET', '/login', [AuthController::class, 'login'], []);
Router::add('GET', '/register', [AuthController::class, 'register'], []);
Router::add('POST', '/register', [AuthController::class, 'store_register'], []);
Router::add('POST', '/login', [AuthController::class, 'store_login'], []);
Router::run();
