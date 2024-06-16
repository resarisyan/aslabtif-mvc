<?php

namespace App\Controller;

use App\Model\Book;

class BookController extends Controller
{
    private $bookModel;
    public function __construct()
    {
        $this->bookModel = new Book();
    }
    public function index()
    {
        $data['books'] = $this->bookModel->getAll();
        $this->view('books/index', $data);
    }
}
