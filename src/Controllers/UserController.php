<?php

namespace App\Controllers;

use App\Controllers\CoreController;

class UserController extends CoreController
{
    public function GETregister()
    {
        $this->render('register');
    }

    public function POSTregister()
    {
        $this->render('register');
    }

    public function GETlogin()
    {
        $this->render('login');
    }

    public function POSTlogin()
    {
        $this->render('login');
    }

    public function logout()
    {
        $this->isConnected();
        // détruire la session
        session_destroy();

        header('Location: /');

        exit();
    }
}