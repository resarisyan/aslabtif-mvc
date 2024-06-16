<?php

namespace App\Middleware;

class MustNotLoginMiddleware
{
    public function handle()
    {
        session_start();
        if (isset($_SESSION['user'])) {
            header('Location: ' . BASEURL . '/books');
            exit;
        }
        return true;
    }
}
