<?php

namespace Controllers;

class Users extends Controller
{
    public static function connexion()
    {
        $errMsg = "";
        // vérifier que le formulaire a été soumis, nous allons utiliser la super globale $_SERVER. cette méthode ne fonctionne qu'avec un formulaire POST
        // var_dump($_SERVER);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // echo 'le formulaire est soumis';
            // il faut toujours sécuriser les saisies utilisateurs | https://www.php.net/manual/en/function.htmlspecialchars | on remplace les caractères html en caractère aléatoires
            $login = htmlspecialchars(trim($_POST['login']));
            // on vérifie si le login est présent en BDD
            $user = \Models\Users::findByLogin($login);
            // var_dump($user);
            if (!$user) {
                $errMsg = "Le login et/ou le mot de passe n'est pas correct";
            } else {
                $pass = htmlspecialchars(trim($_POST['password']));
            }
            if (password_verify($pass, $user['password'])) {
                // echo 'vous êtes connecté';
                // l'utilisateur est correct
                $_SESSION['message'] = "Bienvenue, content de vous revoir";
                $_SESSION['user'] = [
                    'role' => $user['role'],
                    'id' => $user['idUser'],
                    'firstname' => $user['firstname']
                ];
                // quand l'utilisateur est connecté, on le redirige vers la page (route) de notre choix
                header('Location: /');
            } else {
                $errMsg = "Le login et/ou le mot de passe n'est pas correct";
            }
        }
        // 
        self::render('users/connexion', [
            'title' => 'CONNEXION',
            'messageErreur' => $errMsg
        ]);
    }


    public static function deconnexion()
    {
        unset($_SESSION['user']);
        header('Location: /');
        $_SESSION['message'] = "Au revoir et à bientôt";
    }

    public static function inscription()
    {
        // echo "vous êtes dans la méthode inscription";
        $_SESSION['message'] = "Veuillez remplir le formulaire pour vous inscrire";
        $errMsg = "";
        // regex du mot de passe (min 8 char) | https://regex101.com/ | chatGPT
        $pattern = '/^.{8,}$/';
        // on vérifie que tous les champs soient remplis
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (empty($_POST['login']) || !filter_var($_POST['login'], FILTER_VALIDATE_EMAIL)) {
                $errMsg .= 'Merci de saisir un email valide<br>';
            }
            if (empty($_POST['firstname'])) {
                $errMsg .= 'Merci de saisir votre prénom<br>';
            }
            if (empty($_POST['lastname'])) {
                $errMsg .= 'Merci de saisir votre nom<br>';
            }
            if (empty($_POST['address'])) {
                $errMsg .= 'Merci de saisir votre adresse<br>';
            }
            if (empty($_POST['cp'])) {
                $errMsg .= 'Merci de saisir votre code postal<br>';
            }
            if (empty($_POST['city'])) {
                $errMsg .= 'Merci de saisir votre ville<br>';
            }
            if (empty($_POST['password'])) {
                $errMsg .= 'Merci de saisir votre mot de passe<br>';
            }
            if (empty($_POST['confirm'])) {
                $errMsg .= 'Merci de confirmer le mot de passe<br>';
            }
            // on vérifie que les deux password correspondent et min 8 char
            if ($_POST['password'] == $_POST['confirm'] && preg_match($pattern, $_POST['password'])) {
                self::security();
                $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
                // var_dump($_POST);
                // je créer un tableau qui contient les infos du user
                $dataUser = [];
                foreach($_POST as $key => $value){
                    if($key != 'confirm'){
                        $dataUser[] = $value;
                    }
                }
                // var_dump($dataUser);
                // en enregistre en BDD
                \Models\Users::create($dataUser);
                $_SESSION['message'] = 'Votre compte a bien été créé, vous pouvez maintenant vous connecter';
                header('Location: /connexion');

            } else {
                $errMsg = "Les deux mots de passe sont différents";
            }
        }
            self::render('users/inscription', [
                'title' => 'INSCRIPTION',
                'erreurMessage' => $errMsg
            ]);
    }
}
