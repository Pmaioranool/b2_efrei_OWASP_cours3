<?php

namespace App\Controllers;

use App\Controllers\CoreController;

class MainController extends CoreController
{
    // Page d'accueil
    public function home()
    {
        $this->render('home');
    }
}