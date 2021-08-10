<?php

use app\core\Application;

class create_table_0001{
    public function produce(){
        $db = Application::$app->db->pdo;
        $sql = "CREATE TABLE IF NOT EXISTS users(
            id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
            username VARCHAR(256) NOT NULL,
            email VARCHAR(512) NOT NULL UNIQUE,
            password VARCHAR(512) NOT NULL
        );";
        $db->exec($sql);
    }

    public function remove(){
        return "removing...";
    }
}