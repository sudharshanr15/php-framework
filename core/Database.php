<?php

namespace app\core;

class Database{
    public \PDO $pdo;
    public function __construct()
    {
        $dsn = "mysql:host=localhost;dbname=phpframework";
        $username = "root";
        $password = "dharshan";
        $this->pdo = new \PDO($dsn, $username, $password);
        $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }
}