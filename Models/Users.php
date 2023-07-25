<?php

namespace Models;

use PDO;
use App\Db;

class Users extends Db
{
    // CRUD

    // méthode de lecture
    // 1. méthode pour trouver tous les users
    public static function findAll()
    {
        $request = 'SELECT * FROM users';
        $response = self::getDb()->prepare($request);
        $response->execute();

        return $response->fetchAll(PDO::FETCH_ASSOC);
    }

    // 2. méthode pour trouver un user par son id
    public static function findById($id)
    {
        $request = self::getDb()->prepare('SELECT * FROM users WHERE idUser = :id');
        $request->bindValue(':id', $id, PDO::PARAM_INT);
        $request->execute();
        $result = $request->fetch(PDO::FETCH_ASSOC);
        return $result;

        // public static function findById($id){
        //     $request = 'SELECT * FROM users WHERE idUser = :id';
        //     $response = self::getDb()->prepare($request);
        //     $response->bindValue(':id', $id, PDO::PARAM_INT);
        //     $response->execute();

        //     return $response->fetch(PDO::FETCH_ASSOC);

        // public static function findById($id){
        //     $request = "SELECT * FROM users WHERE idUser = $id";
        //     $request->bindValue(':id', $id, PDO::PARAM_INT);
        //     $response = self::getDb()->prepare($request);

        //     return $response->fetch(PDO::FETCH_ASSOC);
        // }
    }

    // 3. méthode pour trouver un user par son login
    public static function findByLogin($login)
    {
        $request = self::getDb()->prepare('SELECT * FROM users WHERE login = :login');
        $request->bindValue(':login', $login, PDO::PARAM_STR);
        $request->execute();
        $result = $request->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    // ne fonctionne pas lors de la recherche
    // public static function findByLogin($login){
    //     $request = "SELECT * FROM users WHERE login = $login";
    //     $response = self::getDb()->prepare($request);
    //     $response->execute();

    //     return $response->fetch(PDO::FETCH_ASSOC);

    // méthodes d'écriture
    // 1. méthode pour créer un user
    public static function create(array $data)
    {
        // syntaxe sans les bindValue(), utilisation du ?
        // avec cette syntaxe, on attend FORCEMENT un tableau en paramètre $data qui contiendra toutes les valeurs à enregistrer en BDD
        $request = "INSERT INTO users (login, password, firstname, lastname, address, cp, city) VALUES (?, ?, ?, ?, ?, ?, ?)"; // ici les ? permettent de ne pas avoir à créer tous les bindValue()
        $response = self::getDb()->prepare($request);
        return $response->execute($data);
    }


    // 2. méthode pour modifier un user
    public static function update(array $data)
    {
        $request = "UPDATE users SET login = ?, password = ?, firstname = ?, lastname = ?, address = ?, cp = ?, city = ? WHERE idUser = ?";
        echo $request;
        $response = self::getDb()->prepare($request);
        return $response->execute($data);
    }

    // Update avec une boucle
    public static function updateBoucle(array $data, $id)
    {
        $request = "UPDATE users SET ";
        foreach ($data as $key => $champs) {
            $column = [];
            if ($key != 'idUser'){
                $request .= $key . " = ?,";
                $column[] = $champs;
            }
        }
        $request = substr($request, 0, -1);
        $request .= " WHERE idUser = $id";
        echo $request;
        $response = self::getDb()->prepare($request);
        return $response->execute($column);
    }



    // 3. méthode pour supprimer un user
    public static function delete($id)
    {
        $request = "DELETE FROM users WHERE idUser = :id";
        $response = self::getDb()->prepare($request);
        $response->bindValue(':id', $id, PDO::PARAM_INT);
        return $response->execute();
    }
}
