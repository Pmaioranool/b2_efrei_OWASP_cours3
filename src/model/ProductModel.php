<?php

namespace App\Models;

use App\Utils\Database;
USE PDO;

class ProductModel extends CoreModel {
    private $id;
    private $titre;
    private $description;
    private $prix;
    private $image;
    private $rating;
    private $categorie_id;
    private $user_id;
    private $pdo;

    public function __construct($id = null, $titre = null, $description = null, $prix = null, $image = null, $rating = null, $categorie_id = null, $user_id = null)
    {
        $this->id = $id;
        $this->titre = $titre;
        $this->description = $description;
        $this->prix = $prix;
        $this->image = $image;
        $this->rating = $rating;
        $this->categorie_id = $categorie_id;
        $this->user_id = $user_id;
    }

    public function getProduit() {
        $stmt = $this->pdo->prepare('SELECT * FROM produits');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}