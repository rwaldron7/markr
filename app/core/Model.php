<?php

namespace App\Core;

class Model
{
    protected static $conn = null;

    public function __construct()
    {
        if(self::$conn == null)
        {
            try 
            {
                // Connection information
                $host = "localhost";
                $user = "root";
                $pw = "";
                $db = "markr";
                // Connect to DB
                self::$conn = new \PDO("mysql:host=$host;dbname=$db",$user,$pw);
            }
            catch (\PDOException $e)
            {
                // Connection information
                $url = parse_url(getenv("CLEARDB_DATABASE_URL"));
                $host = $url["host"];
                $user = $url["user"];
                $pw = $url["pass"];
                $db = substr($url["path"], 1);
                // Connect to DB
                self::$conn = new \PDO("mysql:host=$host;dbname=$db",$user,$pw);          
            }
            
        }
    }
}