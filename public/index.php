<?php

use App\Config\Router;
use App\Controller\HomeController;

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../app/Config/Constants.php';

Router::add('GET', '/', [HomeController::class, 'index'], []);
Router::add('GET', '/show/{id}', [HomeController::class, 'show'], []);
Router::run();
