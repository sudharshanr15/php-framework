<?php

namespace app\models;

use app\core\DbModel;
use app\core\Model;

class RegisterModel extends DbModel{

    // every model instance should have the required property to be defined
    public string $username;
    public string $email;
    public string $password;
    public string $confirmpassword;

    public function save(){
        parent::save();
    }

    public function attributes(): array
    {
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);
        return ['username', 'email', "password"];
    }

    public function tableName(): string
    {
        return "users";
    }

    public function rules(): array
    {
        // these key names should  be the same as the above property names
        return[
            "username"=>[self::RULE_REQUIRED],
            "email"=>[self::RULE_REQUIRED, self::RULE_EMAIL],
            "password"=>[self::RULE_REQUIRED, [self::RULE_MIN, "min"=>8], [self::RULE_MAX, "max"=>32]],
            "confirmpassword"=>[self::RULE_REQUIRED, [self::RULE_MATCH, "match"=>"password"]]
        ];
    }
}