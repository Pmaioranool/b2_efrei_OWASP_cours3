<?php

namespace App\Controllers;

use App\Controllers\CoreController;
use App\Models\UserModel;

class MainController extends CoreController
{
    // Page d'accueil
    public function home()
    {
        $userModel = new UserModel();
        $seller = $userModel->getSeller();
        $this->render('home', $seller);
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