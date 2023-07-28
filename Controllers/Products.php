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

    
    public static function affichageProducts(){
        // pour mon formulaire de tri, je récupère toutes les catégories
        $categories = \Models\Categories::findAll();
        
        // méthode récup/affichage de tous les produit avec ou sans filtre
        if(isset($_GET['idCat']) && $_GET['idCat'] != ""){
            $idCat = $_GET['idCat'];
            $products = \Models\Products::findByCat($idCat);   
        }else{
            $products = \Models\Products::findAll();
        }
        // j'utilise render pour envoyer ces produits à la bonne vue

        self::render('products/accueil', [
            'title' => 'Tous les produits de Mon Bon Coin',
            'products' => $products,
            'categories' => $categories
        ]);

    }
    
    // méthode pour ajouter un produit
    public static function ajoutProduct(){
        $errMsg ="";
        // traitement du form
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if (empty($_POST['idCategory'])) {
                $errMsg .= 'Merci de choisir une catégorie<br>';
            }
            if (empty($_POST['title'])) {
                $errMsg .= 'Merci de saisir un nom pour votre produit<br>';
            }
            if (empty($_POST['price'])) {
                $errMsg .= 'Merci de saisir un prix pour votre produit<br>';
            }
            if (empty($_POST['description'])) {
                $errMsg .= 'Merci de saisir la description de votre produit<br>';
            }
            if (empty($_FILES['image']['name'])){
                $errMsg .= 'Merci de choisir l\'image de votre produit';
            }
            // les contrôles sur l'image
            if($_FILES['image']['size'] < 3000000 && 
            ($_FILES['image']['type'] == 'image/jpeg' ||
            $_FILES['image']['type'] == 'image/jpg' ||
            $_FILES['image']['type'] == 'image/png' ||
            $_FILES['image']['type'] == 'image/webp')){
                //on sécurise les saisies
                self::security();
                // on renomme l'image pour avoir un nom unique
                $photoName = uniqid() . $_FILES['image']['name'];
                // echo $photoName;
                // on copie l'image sur le serveur
                copy($_FILES['image']['tmp_name'], "../Public/image/" . $photoName);
                // on peut maintenant enregistrer l'image en BDD
                $dataProduct = [
                $_POST['idCategory'], 
                $_SESSION['user']['id'],
                $_POST['title'],
                $_POST['description'],
                $_POST['price'],
                $photoName];

                \Models\Products::create($dataProduct);
                $_SESSION['message'] = "Votre annonce a bien été créée, vous pouvez maintenant la gérer depuis votre Profil ";
                // header('Location: /profil');

            }else{
                $errMsg = 'Votre image n\'est pas au format demandé';
            }

        }
        // je récupère toutes les cat
        $categories = \Models\Categories::findAll();
        self::render('products/formProduct', [
            'title' => 'Créer une annonce',
            'categories' => $categories,
            'errMsg' => $errMsg
        ]);
    }
        
        // public static function modifProduct(){
            //     echo "vous êtes dans la méthode modifProduct";
            // }
            
            // public static function suppProduct(){
                //     echo "vous êtes dans la méthode suppProduct";

    public static function recherche(){
        echo "vous êtes dans la méthode recherche";
    }


}