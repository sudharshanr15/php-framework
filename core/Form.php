<?php

namespace app\core;

class Form{
    public static function begin($action, $method){
        echo sprintf('<form method="%s" action="%s">', $method, $action);

        return new Form(); // return itself to get acces to other non-static method inside this class
    }

    public function field(Model $model, string $attribute){
    return new InputField($model, $attribute);
    }

    public static function end(){
        echo "</form>";
    }
}