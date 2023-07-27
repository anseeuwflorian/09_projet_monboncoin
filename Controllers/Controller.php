<?php

namespace Controllers;

class Controller
{
    // méthode render() qui permet d'envoyer données à la bonne vue
    public static function render($views, $data = []){
        // on utilise extract() pour créer autant de variables que de clé présente dans le tableau $data
        extract($data);

        // on commence à mettre en mémoire tampon
        ob_start();
        // on appelle la bonne vue
        require_once('../Views/' . $views . '.php');

        $content = ob_get_clean(); // avec cette méthode ob_get_clean(), on envoit tout ce qui est en mémoire dans la variable et on vide la mémoire

        require_once('../Views/layout.php');
    }

    // méthode de sécurisation des champs du form
    public static function security(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            foreach($_POST as $key => $value){
                $_POST[$key] = htmlspecialchars(trim($value));
            }
        }
    }
}
