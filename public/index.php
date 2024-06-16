<?php

use App\Config\Router;
use App\Controller\BookController;
use App\Controller\AuthController;

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../app/Config/Constants.php';

//Books
Router::add('GET', '/books', [BookController::class, 'index'], []);
Router::add('GET', '/books/create', [BookController::class, 'create'], []);
Router::add('POST', '/books/store', [BookController::class, 'store'], []);
Router::add('GET', '/books/edit/{id}', [BookController::class, 'edit'], []);
Router::add('POST', '/books/update/{id}', [BookController::class, 'update'], []);
Router::add('GET', '/books/delete/{id}', [BookController::class, 'delete'], []);
//Auth
Router::add('GET', '/login', [AuthController::class, 'login'], []);
Router::add('GET', '/register', [AuthController::class, 'register'], []);
Router::add('POST', '/register', [AuthController::class, 'store_register'], []);
Router::run();
