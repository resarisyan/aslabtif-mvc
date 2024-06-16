<?php

namespace App\Middleware;

use App\Middleware\Middleware;

class MustLoginMiddleware extends Middleware
{
    public function handle()
    {
        if (!isset($_SESSION['user'])) {
            header('Location: ' . BASEURL . '/login');
            exit;
        }
        parent::handle();
    }
}
