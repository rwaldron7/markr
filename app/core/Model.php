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
                $host = HOST;
                $user = USER;
                $pw = PW;
                $db = DB;
                // Connect to DB
                self::$conn = new \PDO("mysql:host=$host;dbname=$db",$user,$pw);
            }
            catch (\PDOException $e)
            {
                print("Error connecting to SQL Server.");
                die(print_r($e));          
            }
            
        }
    }
}