<?php

namespace Models;

use PDO;
use App\Db;

class Categories extends Db{
    public static function findAll(){
        $request = 'SELECT * FROM categories';
        $response = self::getDb()->prepare($request);
        $response->execute();

        return $response->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function findById($id){
        $request = 'SELECT * FROM categories WHERE idCategory = :id';
        $response = self::getDb()->prepare($request);
        $response->bindValue(':id', $id, PDO::PARAM_INT);
        $response->execute();

        return $response->fetch(PDO::FETCH_ASSOC);
    }

    // public static function findByCategory($category)
    // {
    //     $request = 'SELECT * FROM categories WHERE title = :title';
    //     $response = self::getDb()->prepare($request);
    //     $response->bindValue(':title', $category, PDO::PARAM_STR);
    //     $response->execute();

    //     return $response->fetch(PDO::FETCH_ASSOC);
    // }

    public static function create(array $data){

        $request = "INSERT INTO categories (title) VALUES (?)";
        $response = self::getDb()->prepare($request);

        return $response->execute($data);
    }

    // public static function create(string $data){
    //     $request = "INSERT INTO categories (title) VALUES (:data)";
    //     $response = self::getDb()->prepare($request);
    //     $response->bindValue(':data', $data, PDO::PARAM_STR);

    //     return $response->execute();
    // }

    public static function update(array $data){
        $request = "UPDATE categories SET title = ? WHERE idCategory = ?";
        $response = self::getDb()->prepare($request);

        return $response->execute($data);
    }

    // public static function update(string $data, int $id){
    //     $request = "UPDATE categories SET title = :title WHERE idCategory = :id";
    //     $response = self::getDb()->prepare($request);
    //     $response->bindValue(':title', $data, PDO::PARAM_STR);
    //     $response->bindValue(':id', $id, PDO::PARAM_STR);

    //     return $response->execute();
    // }

    public static function delete($id){
        $request = "DELETE FROM categories WHERE idCategory = :id";
        $response = self::getDb()->prepare($request);
        $response->bindValue(':id', $id, PDO::PARAM_INT);

        return $response->execute();
    }

    // public static function delete(int $id)
    // {
    //     $request = "DELETE FROM categories WHERE idCategory = :id";
    //     $response = self::getDb()->prepare($request);
    //     $response->bindValue(':id', $id, PDO::PARAM_INT);
    //     return $response->execute();
    // }
}
