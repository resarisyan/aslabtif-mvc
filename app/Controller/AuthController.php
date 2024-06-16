<?php

namespace App\Controller;

use App\Model\User;

class AuthController extends Controller
{
    private $userModel;
    public function __construct()
    {
        $this->userModel = new User();
    }

    public function login()
    {
        $this->view('auth/login');
    }

    public function register()
    {
        $this->view('auth/register');
    }

    public function store_register()
    {
        $data = [
            'nama' => $this->inputPost('name'),
            'username' => $this->inputPost('username'),
            'password' => password_hash($this->inputPost('password'), PASSWORD_DEFAULT)
        ];
        $user = $this->userModel->getWhere(['username' => $data['username']]);
        if ($user) {
            $this->redirect('register');
        }

        $this->userModel->create($data);
        $this->redirect('login');
    }

    public function store_login()
    {
        $data = [
            'username' => $this->inputPost('username'),
            'password' => $this->inputPost('password')
        ];

        $user = $this->userModel->getWhere(['username' => $data['username']]);
        if (!$user) {
            $this->redirect('login');
        }

        if (!password_verify($data['password'], $user[0]['password'])) {
            $this->redirect('login');
        }

        session_start();
        $_SESSION['user'] = $user;
        $this->redirect('books');
    }

    public function logout()
    {
        session_start();
        session_destroy();
        $this->redirect('login');
    }
}
