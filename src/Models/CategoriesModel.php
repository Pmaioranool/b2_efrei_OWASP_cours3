<?php

namespace App\Models;

use App\Utils\Database;

class CategoriesModel extends CoreModel
{

    private $id;
    private $titre;
    private $parent;

    public function __construct($id = null, $titre = null, $parent = null)
    {
        $this->id = $id;
        $this->titre = $titre;
        $this->parent = $parent;
    }

    public function GetAllCategories()
    {
        $pdo = Database::getPDO();
        $sql = 'SELECT * FROM `categories`';
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $categories = $stmt->fetchAll();
        return $categories;
    }
}