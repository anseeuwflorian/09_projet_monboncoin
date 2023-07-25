<?php

namespace App;

class Routeur{
    private $routes = [
        '/'=> ['controller' => 'Accueil'],
        '/products'=> ['controller' => 'products'],
        '/detailProduct'=> ['controller' => 'detailProduct'],
        '/inscription'=> ['controller' => 'inscription'],
        '/connexion'=> ['controller' => 'connexion'],
        '/deconnexion'=> ['controller' => 'deconnexion'],
        '/ajoutProduct'=> ['controller' => 'ajoutProduct'],
        '/modifProduct'=> ['controller' => 'modifProduct'],
        '/suppProduct'=> ['controller' => 'suppProduct'],
        '/panier'=> ['controller' => 'panier']
    ];
    // je créer une méthode app qui est la méthode centrale de mon site, le fichier index.php ne fera qu'une seule chose:
        // exécuter cette méthode
    public function app(){
        // on test le routeur 
        // echo 'test routeur';

        //on doit récupérer l'url
        $request = $_SERVER['REQUEST_URI'];
        echo $request;
        // je ne veux pas récupérer les param dans mes routes, donc je casse la chaîne de caractère en prenant " ? " comme séparateur
        $request = explode("?", $request);
        // var_dump($request);
        $request = $request[0];
        // echo $request;

        // on vérifie si la route ($request) est bien présente dans le tableau de routes
        if(array_key_exists($request, $this->routes)){
            echo $this->routes[$request]['controller'];
        }else{
            echo 'la page que vous demandez n\'existe pas';
        }




    }
}