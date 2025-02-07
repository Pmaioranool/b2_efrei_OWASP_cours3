<?php

namespace App\Models;

use PDO;
use App\Utils\Database;
use App\Models\CoreModel;


class CategoriesModel extends CoreModel
{

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
      
        $sql = 'SELECT * FROM categories';
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $categories;
    }
}