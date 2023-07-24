<?php

namespace App;

use PDO;
use PDOException;

// cette classe permet de se connecter à la BDD en utilisant le pattern singleton
class Db{
    private static $db; // pour stocker mon objet PDO

    // singleton
    static function getDb(){
        if(!self::$db){
            try {
                $config = file_get_contents("../App/config.json");
                // var_dump($config); // on reçoit une chaîne de caractère
                // pour pouvoir utiliser un fichier json il faut le décoder
                $config = json_decode($config);
                // var_dump($config);
                // on créer l'objet PDO
                self::$db = new PDO("mysql:host=$config->host;dbname=$config->dbName", $config->user, $config->password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            } catch (PDOException $err) {
                echo "Problème de connexion à la BDD :" . $err->getMessage();
            }
        }
        return self::$db;
    }

}

$newObject = new Db;

$newObject::getDb();