<?php

namespace Models;

use PDO;
use App\Db;

class Products extends Db{
    // CRUD

    // méthode de lecture

    // afficher tous les produits
    public static function findAll($order = null, $limit = null){
        // pour récupérer le nom des catégories on doit faire une jointure
        $request = 'SELECT *, products.title AS productsTitle, categories.title AS catTitle FROM products INNER JOIN categories ON products.idCategory = categories.idCategory';
        // on voudrait pouvoir ordonner les réponses par prix ascendant
        // if($order){
        //     $request .= "ORDER BY price $order";
        // }
        $order ? $request .= " ORDER BY price $order" : null;
        $limit ? $request .= " LIMIT $limit" : null;
        $response = self::getDb()->prepare($request);
        $response->execute();

        return $response->fetchAll(PDO::FETCH_ASSOC);
    }

        public static function findById($id){
        $request = 'SELECT *, products.title AS productsTitle, categories.title AS catTitle FROM products INNER JOIN categories ON products.idCategory = categories.idCategory WHERE idProduct = :id';
        $response = self::getDb()->prepare($request);
        $response->bindValue(':id', $id, PDO::PARAM_INT);
        $response->execute();

        return $response->fetch(PDO::FETCH_ASSOC);
    }

    public static function findByUser($idUser){
        $request = 'SELECT *, products.title AS productsTitle, categories.title AS catTitle FROM products INNER JOIN categories ON products.idCategory = categories.idCategory WHERE idUser = :idUser';
        $response = self::getDb()->prepare($request);
        $response->bindValue(':idUser', $idUser, PDO::PARAM_INT);
        $response->execute();

        return $response->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function findByCat($idCategory, $order = null){
        $request = 'SELECT *, products.title AS productsTitle, categories.title AS catTitle FROM products INNER JOIN categories ON products.idCategory = categories.idCategory WHERE products.idCategory = :idCategory'; // ici on a un idCategory dans les 2 tables, il faut donc préciser dans quelle table il faut aller le chercher avec la syntaxe  table.champs
        $order ? $request .= "ORDER BY price $order" : null;
        $response = self::getDb()->prepare($request);
        $response->bindValue(':idCategory', $idCategory, PDO::PARAM_INT);
        $response->execute();

        return $response->fetchAll(PDO::FETCH_ASSOC);
    }

    // méthodes d'écriture
    public static function create(array $data){
        $request = "INSERT INTO products (idCategory, idUser, title, description, price, image) VALUES (?, ?, ?, ?, ?, ?)";
        $response = self::getDb()->prepare($request);

        return $response->execute($data);
    }

    public static function update(array $data)
    {
        $request = "UPDATE products SET idCategory = ?, idUser = ?, title = ?, description = ?, price = ?, image = ? WHERE idProduct = ?";
        $response = self::getDb()->prepare($request);

        return $response->execute($data);
    }

    public static function delete($id)
    {
        $request = "DELETE FROM products WHERE idProduct = :id";
        $response = self::getDb()->prepare($request);
        $response->bindValue(':id', $id, PDO::PARAM_INT);

        return $response->execute();
    }
}
