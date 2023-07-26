<?php

namespace Controllers;


class Products extends Controller{
    public static function accueil(){

        // on fait appelle à la méthode findAll() du model Products pour récup les produits
        $products = \Models\Products::findAll('date DESC', 2);
        // on utilise la méthode render() du controller principal pour afficher la bonne vue avec les bonnes infos
        self::render('products/accueil', [
            'title' => 'Les deux derniers produits',
            'products' => $products
        ]);
    }

    // public static function affichageProducts(){
    //     echo "vous êtes dans la méthode affichageProducts";

    // }

    // public static function detailProduct(){
    //     echo "vous êtes dans la méthode detailProduct";
    // }

    // public static function ajoutProduct(){
    //     echo "vous êtes dans la méthode ajoutProduct";
    // }

    // public static function modifProduct(){
    //     echo "vous êtes dans la méthode modifProduct";
    // }

    // public static function suppProduct(){
    //     echo "vous êtes dans la méthode suppProduct";
}