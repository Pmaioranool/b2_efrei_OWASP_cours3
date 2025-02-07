<?php

namespace App\Controllers;

use App\Controllers\CoreController;
use App\Models\UserModel;
use App\Models\ProductModel;

class MainController extends CoreController
{
    // Page d'accueil
    public function home()
    {
        $userModel = new UserModel();
        $seller = $userModel->getRole("seller");
        $produtcModel = new ProductModel();
        $product = $produtcModel->getLastProduct();
        $data = [
            'seller' => $seller,
            'product' => $product
        ];
        $this->render('home', $data);
    }
    public function produit()
    {
        $this->render('produit');
    }

    public function register()
    {
        $this->render('register');
    }
    public function login()
    {

        $this->render('login');
    }

}