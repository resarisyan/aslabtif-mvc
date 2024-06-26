<?php

namespace App\Middleware;

class MustLoginMiddleware
{
    public function handle()
    {
        session_start();
        if (!isset($_SESSION['user'])) {
            header('Location: ' . BASEURL . '/login');
            exit;
        }
        return true;
    }
}
