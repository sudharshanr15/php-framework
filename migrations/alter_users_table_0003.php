<?php

use app\core\Application;

class alter_users_table_0003{
    public function produce(){
     $db = Application::$app->db->pdo;
     $sql = "ALTER TABLE users ADD COLUMN created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP";
     $db->exec($sql); 
    }
}