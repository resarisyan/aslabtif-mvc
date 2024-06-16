<?php

namespace App\Middleware;

use App\Middleware\Middleware;

class MustLoginMiddleware extends Middleware
{
    public function handle()
    {
        if (!isset($_SESSION['user'])) {
            header('Location: /login');
            exit;
        }
        parent::handle();
    }
}
