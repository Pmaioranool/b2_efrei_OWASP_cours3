<?php

namespace App\Models;

use App\Utils\Database;
USE PDO;

class RepportModel extends CoreModel {
    private $id;
    private $titre;
    private $message;
    private $user_id;
    private $pdo;

    public function __construct($id = null, $titre = null, $message = null, $user_id = null)
    {
        $this->id = $id;
        $this->titre = $titre;
        $this->message = $message;
        $this->user_id = $user_id;
    }

    public function getRepport() {
        $stmt = $this->pdo->prepare('SELECT * FROM repport');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}