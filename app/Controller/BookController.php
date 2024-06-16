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

    public function create()
    {
        $this->view('books/create');
    }

    public function store()
    {
        $data = [
            'nama' => $this->inputPost('nama'),
            'image' => $this->uploadFile('image', 'books'),
            'deskripsi' => $this->inputPost('deskripsi')
        ];
        $this->bookModel->create($data);
        $this->redirect('books');
    }

    public function edit($id)
    {
        $data['book'] = $this->bookModel->getById($id);
        $this->view('books/edit', $data);
    }
}
