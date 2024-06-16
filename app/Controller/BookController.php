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

    public function update($id)
    {
        $data = [
            'nama' => $this->inputPost('nama'),
            'deskripsi' => $this->inputPost('deskripsi')
        ];
        if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
            $data['image'] = $this->uploadFile('image', 'books');
        }
        $this->bookModel->update(['id' => $id], $data);
        $this->redirect('books');
    }

    public function delete($id)
    {
        $this->bookModel->delete(['id' => $id]);
        $this->redirect('books');
    }
}
