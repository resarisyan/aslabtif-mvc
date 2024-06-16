<?php

namespace App\Controller;

use App\Model\Product;

class HomeController extends Controller
{
    private $modelProduct;
    public function __construct()
    {
        $this->modelProduct = new Product();
    }

    public function index()
    {
        $data['products'] = $this->modelProduct->getAll();
        $this->view('home/index', $data);
    }

    public function show($id)
    {
        $data['product'] = $this->modelProduct->getWhere(['id' => $id]);
    }

    public function create()
    {
        $data = [
            'name' => 'Product 1',
            'price' => 1000
        ];
        $this->modelProduct->create($data);
    }



    public function test()
    {
        echo 'Test';
    }
}
