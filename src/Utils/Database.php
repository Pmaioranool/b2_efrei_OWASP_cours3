<?php

// Retenir son utilisation  => Database::getPDO()
// Design Pattern : Singleton
/**
 * Classe qui va nous permettre de nous connecter à notre base de données = oshop
 */
namespace App\Utils;

use PDO;

class Database
{
    /** @var PDO */
    private $dbh;
    private static $_instance;
    private function __construct()
    {
        // Récupération des données du fichier de config
        // la fonction parse_ini_file parse le fichier et retourne un array associatif

        $configData = parse_ini_file(__DIR__ . '/../config.ini');

        try {
            $this->dbh = new PDO(
                "pgsql:host={$configData['DB_HOST']};dbname={$configData['DB_NAME']};options='--client_encoding=UTF8'",
                $configData['DB_USERNAME'],
                $configData['DB_PASSWORD'],
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING) // Affiche les erreurs SQL à l'écran
            );
        } catch (\Exception $exception) {
            echo 'Erreur de connexion...<br>';
            echo $exception->getMessage() . '<br>';
            echo '<pre>';
            echo $exception->getTraceAsString();
            echo '</pre>';
            exit;
        }
    }
    // the unique method you need to use
    public static function getPDO()
    {
        // If no instance => create one
        if (empty(self::$_instance)) {
            self::$_instance = new Database();
        }
        return self::$_instance->dbh;
    }
}