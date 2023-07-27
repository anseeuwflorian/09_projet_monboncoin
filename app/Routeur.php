<?php

namespace App;

use Controllers\Controller;

class Routeur{
    private $routes = [
        '/'=> ['controller' => 'Products', 'action' => 'accueil'],
        '/products'=> ['controller' => 'Products', 'action' => 'affichageProducts'],
        '/detailProduct'=> ['controller' => 'Products', 'action' => 'detailProduct'],
        '/ajoutProduct'=> ['controller' => 'Products', 'action' => 'ajoutProduct'],
        '/modifProduct'=> ['controller' => 'Products', 'action' => 'modifProduct'],
        '/suppProduct'=> ['controller' => 'Products', 'action' => 'suppProduct'],
        '/inscription'=> ['controller' => 'Users', 'action' => 'inscription'],
        '/connexion'=> ['controller' => 'Users', 'action' => 'connexion'],
        '/deconnexion'=> ['controller' => 'Users', 'action' => 'deconnexion'],
        '/panier'=> ['controller' => 'Panier', 'action' => 'gestionPanier'],
        '/profil'=>['controller' => 'Users', 'action' => 'profil']
    ];
    // je créer une méthode app qui est la méthode centrale de mon site, le fichier index.php ne fera qu'une seule chose:
        // exécuter cette méthode
    public function app(){
        // on test le routeur 
        // echo 'test routeur';

        //on doit récupérer l'url
        $request = $_SERVER['REQUEST_URI'];
        // echo $request;
        // je ne veux pas récupérer les param dans mes routes, donc je casse la chaîne de caractère en prenant " ? " comme séparateur
        $request = explode("?", $request);
        // var_dump($request);
        $request = $request[0];
        // echo $request;

        // on vérifie si la route ($request) est bien présente dans le tableau de routes
        if(array_key_exists($request, $this->routes)){
            $controller = "Controllers\\" . $this->routes[$request]['controller'];
            $action = $this->routes[$request]['action'];
            $controller::$action();
            
        }else{
            echo 'la page que vous demandez n\'existe pas';
        }




    }
}