<?php

namespace App\Middleware;

class Middleware
{
    protected $next;

    public function __construct($next = null)
    {
        $this->next = $next;
    }

    public function handle()
    {
        if ($this->next !== null) {
            $this->next->handle();
        }
    }
}
