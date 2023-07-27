<?php

namespace Controllers;

class Users extends Controller{
    public static function connexion(){
        $errMsg ="";
        // vérifier que le formulaire a été soumis, nous allons utiliser la super globale $_SERVER. cette méthode ne fonctionne qu'avec un formulaire POST
        // var_dump($_SERVER);
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // echo 'le formulaire est soumis';
            // il faut toujours sécuriser les saisies utilisateurs | https://www.php.net/manual/en/function.htmlspecialchars | on remplace les caractères html en caractère aléatoires
            $login = htmlspecialchars(trim($_POST['login']));
            // on vérifie si le login est présent en BDD
            $user = \Models\Users::findByLogin($login);
            // var_dump($user);
            if(!$user){
                $errMsg = "Le login et/ou le mot de passe n'est pas correct";
            }else{
                $pass = htmlspecialchars(trim($_POST['password']));
            }
            if(password_verify($pass, $user['password'])){
                // echo 'vous êtes connecté';
                // l'utilisateur est correct
                $_SESSION['message'] = "Salut, content de vous revoir";
                $_SESSION['user'] = [
                    'role' => $user['role'],
                    'id' => $user['idUser'],
                    'firstname' => $user['firstname']
                ];
                // quand l'utilisateur est connecté, on le redirige vers la page (route) de notre choix
                header('Location: /');
            }else{
                $errMsg = "Le login et/ou le mot de passe n'est pas correct";
            }
        }
        // 
        self::render('users/connexion', [
            'title' => 'CONNEXION',
            'messageErreur' => $errMsg
        ]);
    }

    // public static function inscription(){
    //     echo "vous êtes dans la méthode inscription";
    // }

    public static function deconnexion(){
        unset($_SESSION['user']);
        header('Location: /');
        $_SESSION['message'] = "Au revoir et à bientôt";
    }
    
}
