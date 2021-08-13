<?php

namespace app\core;

abstract class DbModel extends Model{
    abstract function tableName(): string;
    abstract function attributes(): array;

    public function save(){
        $tableName = $this->tableName();
        $attributes = $this->attributes();
        try{
            $params = array_map(fn($attr)=>":$attr", $attributes);
            $statement = self::prepare("INSERT INTO $tableName (" . implode(",", $attributes) . ") VALUES (" . implode(",", $params) . ")");
            foreach($attributes as $attribute){
                $statement->bindValue(":$attribute", $this->{$attribute});
            }
            $statement->execute();
            return true;
        }catch(\Exception $e){
            echo $e->getMessage();
            return false;
        }
    }

    public static function prepare($sql){
        return Application::$app->db->pdo->prepare($sql);
    }
}