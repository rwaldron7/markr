<?php

namespace App\Model;

use App\Core\Model;

class User extends Model
{
    public $user_id;
    public $username;
    
    public function get()
    {
        echo "Get is being called";
        $sql = 'SELECT username, user_id FROM users';
        $stmt = self::$conn->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(\PDO::FETCH_CLASS, 'App\Model\User');
        return $stmt->fetchAll();
    }

    public function create()
    {
        $sql = 'INSERT INTO users(username) VALUE (:username)';
        $stmt = self::$conn->prepare($sql);
        $stmt->execute(['username'=>$this->username]);
        return $stmt->rowCount();

    }

    public function find($user_id)
    {
        $sql = 'SELECT username FROM users WHERE user_id = :user_id';
        $stmt = self::$conn->prepare($sql);
        $stmt->execute(['user_id'=>$user_id]);
        $stmt->setFetchMode(\PDO::FETCH_CLASS, 'App\Model\User');
        return $stmt->fetch();
    }
}