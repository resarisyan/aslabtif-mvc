<?php

use App\Config\Router;
use App\Controller\BookController;

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../app/Config/Constants.php';

Router::add('GET', '/books', [BookController::class, 'index'], []);
Router::add('GET', '/books/create', [BookController::class, 'create'], []);
Router::add('POST', '/books/store', [BookController::class, 'store'], []);
Router::add('GET', '/books/edit/{id}', [BookController::class, 'edit'], []);
Router::run();
