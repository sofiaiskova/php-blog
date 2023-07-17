<?php

namespace Blog;

use Exception;
use PDO;

class Test 

{
    public const SOF_BODY_COUNT = 45;
    
    public function word() {
        $config = include 'config/database.php';
        $dsn = $config['dsn'];
        $username = $config['username'];
        $password = $config['password'];
        try {
            $connection = new PDO($dsn, $username, $password);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $statement = $connection->prepare('SELECT * FROM cards'); 
            $statement->execute();
            $result = $statement->fetchAll();
        } catch (Exception $exception) {
            // echo "<pre>";
            // print_r($exception);
            // echo "<pre>";

            echo $exception->getMessage();
            die();
        }



    } 
}

