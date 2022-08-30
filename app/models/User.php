<?php

namespace App\Model;

use App\Core\Model;

class User extends Model
{
    public $username;
    public $password_hash;

    public function find_id($user_id)
    {
        $sql = 'SELECT * FROM users WHERE user_id = :user_id';
        $stmt = self::$conn->prepare($sql);
        $stmt->execute(['user_id'=>$user_id]);
        $stmt->setFetchMode(\PDO::FETCH_CLASS, 'App\Model\User');
        return $stmt->fetch();
    }

    public function find_username($username)
    {
        $sql = 'SELECT * FROM users WHERE username = :username';
        $stmt = self::$conn->prepare($sql);
        $stmt->execute(['username'=>$username]);
        $stmt->setFetchMode(\PDO::FETCH_CLASS, 'App\Model\User');
        return $stmt->fetch();
    }

    public function create_user()
    {
        $sql = 'INSERT INTO users(username, password_hash) VALUES (:username, :password_hash)';
        $stmt = self::$conn->prepare($sql);
        $stmt->execute(['username'=>$this->username, 'password_hash'=>$this->password_hash]);
        return $stmt->fetch();
    }
}