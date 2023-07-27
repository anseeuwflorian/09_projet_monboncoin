<?php

use App\Routeur;
use Models\Users;

// pour gérer les connexions, on utilise la session
session_start();
// j'ai maintenant accès à $_SESSION dans toute mon app

//ce fichier est le point d'entrée de notre site

// echo "point d'entrée";
// pour rester sur le fichier index.php quoi qu'il arrive, je dois faire une réécriture d'url
// une des possibilités est d'utiliser un fichier de config du serveur apache qui s'appelle .htaccess
// nous allons créer son fichier dans le répertoire public
// nous allons aussi créer un virtualHost

// on importe l'autoloader
require_once('../autoloader.php');

// on créer un routeur pour gérer les routes
// on appelle la méthode app()
$routeur = new Routeur;
$routeur->app();




// $pass = password_hash('12345678', PASSWORD_DEFAULT);

// $data = ['user1@gmail.com', $pass, 'user', 'user1', '12 rue de Paris', '93100', 'Montreuil', 2];

// Users::update($data);
?>