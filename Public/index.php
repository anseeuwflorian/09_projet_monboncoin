<?php

use App\Routeur;

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