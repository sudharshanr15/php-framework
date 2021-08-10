<?php

namespace app\core;

use app\core\Application;

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

    public function createMigrationsTable(){
        $this->pdo->exec("CREATE TABLE IF NOT EXISTS migrations(
            id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
            migration VARCHAR(256) NOT NULL,
            created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
        );");
    }

    public function checkMigrations(){
        $this->createMigrationsTable();
        $newMigrations = [];
        $files = scandir(Application::$ROOT_DIR . "/migrations");
        $appliedMigrations = $this->getAllMigrations();
        $toApplyMigrations = array_diff($files, $appliedMigrations);

        foreach($toApplyMigrations as $migration){
            if($migration === "." || $migration === ".."){
                continue;
            }
            require_once Application::$ROOT_DIR."/migrations/".$migration;
            $class = pathinfo($migration, PATHINFO_FILENAME);
            echo "Applying migration...." . PHP_EOL;
            $class = new $class();
            $class->produce();
            echo "Applied migration." . PHP_EOL;
            $newMigrations[] = $migration;
        }

        if(!empty($newMigrations)){
            $this->saveMigrations($newMigrations);
        }else{
            echo "All migrations are applied!";
        }
    }

    public function saveMigrations(array $migrations){
        $values = implode(",", array_map(fn($m)=>"('$m')", $migrations));
        $statement = $this->pdo->prepare("INSERT INTO migrations(migration) VALUES $values");
        $statement->execute();
    }

    public function getAllMigrations(){
        $query = "SELECT migration FROM migrations";
        $statement = $this->pdo->prepare($query);
        $statement->execute();
        return $statement->fetchAll(\PDO::FETCH_COLUMN);
    }
}