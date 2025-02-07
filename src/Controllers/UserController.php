<?php

namespace App\Controllers;

use App\Controllers\CoreController;
use App\Models\UserModel;

class UserController extends CoreController
{
    public function GETregister()
    {
        $this->render('register');
    }

    public function POSTregister()
    {
        // Récupérer les données du formulaire
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $password = htmlspecialchars($_POST['password']);
        $passwordConfirm = htmlspecialchars($_POST['passwordConfirm']);
        $name = htmlspecialchars($_POST['name']);
        $firstname = htmlspecialchars($_POST['firstname']);

        $emptyFields = empty($email) || empty($password) || empty($passwordConfirm) || empty($name) || empty($firstname);

        if ($emptyFields || $password !== $passwordConfirm) {
            $this->render('register', ['error' => 'Tous les champs sont obligatoires']);
            return;
        }

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $userModel = new UserModel($email, $hashedPassword, $name, $firstname);
        $userModel->register();

        header('Location: /');
        exit();
    }

    public function GETlogin()
    {
        $this->render('login');
    }

    public function POSTlogin()
    {
        // Récupérer les données du formulaire
        $email = filter_input(INPUT_POST, $_POST['email'], FILTER_VALIDATE_EMAIL);
        $password = htmlspecialchars($_POST['password']);

        $emptyFields = empty($email) || empty($password);

        if ($emptyFields) {
            $this->render('login', ['error' => 'Tous les champs sont obligatoires']);
            return;
        }

        $userModel = new UserModel($email);

        if (!$userModel->login($password)) {
            $this->render('login', ['error' => 'Email ou mot de passe incorrect']);
            return;
        }

        $userModel->login($password);

        $_SESSION['user'] =

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