<?php

namespace App\Model;

use App\Core\Model;

class Item extends Model
{  
    public function get()
    {
        $sql = 'SELECT username, user_id FROM users';
        $stmt = self::$conn->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(\PDO::FETCH_CLASS, 'App\Model\Item');
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
        $sql = 'SELECT * FROM users WHERE user_id = :user_id';
        $stmt = self::$conn->prepare($sql);
        $stmt->execute(['user_id'=>$user_id]);
        $stmt->setFetchMode(\PDO::FETCH_CLASS, 'App\Model\Item');
        return $stmt->fetch();
    }

    public function update()
    {
        $sql = 'UPDATE users SET username = :username WHERE user_id = :user_id';
        $stmt = self::$conn->prepare($sql);
        $stmt->execute(['username'=>$this->username,'user_id'=>$this->user_id]);
        return $stmt->rowCount();
    }

    public function remove()
    {
        $sql = 'DELETE FROM users WHERE user_id = :user_id';
        $stmt = self::$conn->prepare($sql);
        $stmt->execute(['user_id'=>$this->user_id]);
        return $stmt->rowCount();
    }

}