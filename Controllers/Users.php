<?php

namespace Controllers;

class Users extends Controller{
    public static function connexion(){
        self::render('users/connexion', [
            'title' => 'CONNEXION',
        ]);
    }

    public static function inscription(){
        echo "vous êtes dans la méthode inscription";
    }


    public static function deconnexion(){
        echo "vous êtes dans la méthode deconnexion";
    }
}
