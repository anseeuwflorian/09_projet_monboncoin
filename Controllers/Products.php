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
    
    
    // méthode pour récup un produit par son id et l'envoyer à la vue detailProduct

    public static function detailProduct(){
        // je créer une variable pour stocker les erreurs potentielles
        $err = "";
        if(isset($_GET['id'])){
            $idProduct = $_GET['id'];
            // echo $idProduct;
            $product = \Models\Products::findById($idProduct);
            // var_dump($product);
            $err = !$product ? "Le produit n'existe pas" : null;
            // echo $err;

            // après avoir récup le produit, on récupère le user propriétaire du produit pour avoir accès à son address
            $idUser = $product['idUser'];
            $userProduct = \Models\Users::findById($idUser);





            // j'utilise le render
            self::render('products/detailProduct', [
                'title' => 'Détail du produit',
                'product' => $product,
                'user' => $userProduct,
                'error' => $err

            ]);
        }
    }

    // public static function ajoutProduct(){
    //     echo "vous êtes dans la méthode ajoutProduct";
    // }

    // public static function modifProduct(){
    //     echo "vous êtes dans la méthode modifProduct";
    // }

    // public static function suppProduct(){
    //     echo "vous êtes dans la méthode suppProduct";
}