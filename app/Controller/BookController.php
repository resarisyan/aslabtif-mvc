<?php

namespace App\Controller;

class BookController extends Controller
{
    public function index()
    {
        $this->view('books/index');
    }
}
