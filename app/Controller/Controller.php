<?php

namespace App\Controller;

class Controller
{
    public function view($view, $data = [])
    {
        extract($data);
        $viewPath = __DIR__ . "/../View/$view.php";
        if (file_exists($viewPath)) {
            require_once $viewPath;
        } else {
            die("View file not found: $viewPath");
        }
    }

    public function model($model)
    {
        require_once __DIR__ . "/../Model/$model.php";
        return new $model;
    }

    public function redirect($url)
    {
        header('Location: ' . BASEURL . '/' . $url);
        exit;
    }

    public function inputPost($key, $default = null)
    {
        return isset($_POST[$key]) ? $_POST[$key] : $default;
    }

    public function inputGet($key, $default = null)
    {
        return isset($_GET[$key]) ? $_GET[$key] : $default;
    }

    public function uploadFile($fileKey, $destination)
    {
        if (isset($_FILES[$fileKey])) {
            $file = $_FILES[$fileKey];
            $fileName = $file['name'];
            $fileTmpName = $file['tmp_name'];
            $fileError = $file['error'];

            if ($fileError === 0) {
                $date = date('Y-m-d');
                $extension = pathinfo($fileName, PATHINFO_EXTENSION);
                $newFileName = $date . '_' . $fileName . '_' . uniqid() . '.' . $extension;
                $storagePath = __DIR__ . "/../../public/storage/$destination";
                if (!file_exists($storagePath)) {
                    mkdir($storagePath, 0777, true);
                }
                $destinationPath = $storagePath . "/$newFileName";
                move_uploaded_file($fileTmpName, $destinationPath);
                return $destination . "/$newFileName";
            } else {
                die("File upload error: $fileError");
            }
        } else {
            die("File not found: $fileKey");
        }
    }
}
