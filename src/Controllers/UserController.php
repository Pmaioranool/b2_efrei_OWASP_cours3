<?php

namespace App\Controllers;

use App\Controllers\CoreController;
use App\Models\UserModel;

class UserController extends CoreController
{
    public function GETregister()
    {
        $this->render('user/register');
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
            $this->redirect('user/register', 'Tous les champs sont obligatoires');
            return;
        }

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $userModel = new UserModel($email, $hashedPassword, $name, $firstname);
        $userModel->register();

        $this->redirect('', 'Votre compte a bien été créé, vous pouvez maintenant vous connecter');
    }

    public function GETlogin()
    {
        $this->render('user/login');
    }

    public function POSTlogin()
    {
        // Récupérer les données du formulaire
        $email = filter_input(INPUT_POST, $_POST['email'], FILTER_VALIDATE_EMAIL);
        $password = htmlspecialchars($_POST['password']);

        $emptyFields = empty($email) || empty($password);

        if ($emptyFields) {
            $this->render('user/login', ['error' => 'Tous les champs sont obligatoires']);
            return;
        }

        $userModel = new UserModel($email);

        if (!$userModel->login($password)) {
            $this->redirect('user/login', 'Email ou mot de passe incorrect');
            return;
        }

        $_SESSION['user'] = $userModel->getInfo();

        $this->render('user/login');
    }

    public function logout()
    {
        $this->isConnected();
        // détruire la session
        session_destroy();

        $this->redirect('', 'Déconnexion réussie');

    }

    public function GETProfile()
    {
        $this->isConnected();
        $id = $_SESSION['user']['id'];
        $userModel = new UserModel($id);
        $products = $userModel->getAllProductsByUser();
        $this->render('user/profile', $products);
    }

    public function presentation($matches)
    {
        $id = $matches['id'];
        $userModel = new UserModel($id);
        $users = $userModel->getInfos();
        $this->render('presentation', $users);
    }
}