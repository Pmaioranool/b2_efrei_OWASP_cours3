<?php

namespace App\Models;

use App\Utils\Database;
USE PDO;

class UserModel extends CoreModel {
    private $id;
    private $nom;
    private $prenom;
    private $email;
    private $password;
    private $id_role;
    private $pdo;

    public function __construct($id = null, $nom = null, $prenom = null, $email = null, $password = null, $id_role = null)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->password = $password;
        $this->id_role = $id_role;
    }


    public function CreateUser($nom, $prenom, $email, $password) {
        $stmt = $this->pdo->prepare('INSERT INTO users (nom, prenom, email, password) VALUES (?,?,?,?)');
        return $stmt->execute([$nom, $prenom, $email, $password]);
    }

    public function SelectUser($email, $password) {
        $stmt = $this->pdo->prepare('SELECT * FROM users WHERE email = :email AND password = :password');
        $stmt->execute([$email, $password]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function GetInfo($id, $nom, $prenom, $titre) {
        $stmt = $this->pdo->prepare('SELECT * FROM users INNER JOIN roles ON roles.id_roles=users.id_roles WHERE nom = :nom AND prenom = :prenom AND titre = :titre');
        $stmt->execute([$nom, $prenom, $titre]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}