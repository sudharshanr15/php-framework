<?php

namespace app\core;

abstract class Model{
    
    public const RULE_REQUIRED = "required"; 
    public const RULE_EMAIL = "email"; 
    public const RULE_MIN = "min"; 
    public const RULE_MAX = "max";
    public const RULE_MATCH = "match";
    public const RULE_UNIQUE = "unique";

    public array $errors;

    abstract function rules(): array;

    public function loadData($data){
        foreach($data as $key => $value){
            if(property_exists($this, $key)){
                $this->{$key} = $value;
            }
        }
    }

    public function validate(){
        $rules = $this->rules();
        foreach($rules as $attribute => $rules){
            $value = $this->{$attribute};

            foreach($rules as $rule){
                $ruleName = $rule;

                if(!is_string($rule)){
                    $ruleName = $rule[0];
                }

                if($ruleName === self::RULE_REQUIRED && !$value){
                    $this->addErrorsForRule(self::RULE_REQUIRED, $attribute);
                }

                if($ruleName === self::RULE_EMAIL && !filter_var($value, FILTER_VALIDATE_EMAIL)){
                    $this->addErrorsForRule(self::RULE_EMAIL, $attribute);
                }

                if($ruleName === self::RULE_MIN && strlen($value) < $rule['min']){
                    $this->addErrorsForRule(self::RULE_MIN, $attribute, $rule);
                }

                if($ruleName === self::RULE_MAX && strlen($value) > $rule['max']){
                    $this->addErrorsForRule(self::RULE_MAX, $attribute, $rule);
                }

                if($ruleName === self::RULE_MATCH && $value !== $this->{$rule['match']}){
                    $this->addErrorsForRule(self::RULE_MATCH, $attribute, $rule);
                }

            }
        }

        return empty($this->errors);
    }

    public function errorMessages(){
        return [
            self::RULE_REQUIRED => "This field is required!",
            self::RULE_EMAIL => "Valid Email is required",
            self::RULE_MATCH => "This field should be the same as {match}",
            self::RULE_MIN => "Min length of this field must be {min}",
            self::RULE_MAX => "Max length of this field must be {max}",
            self::RULE_UNIQUE => "Record with this {field} already exists"
        ];
    }

    public function addErrorsForRule(string $rule, string $attribute, $params = []){
        $errorMessage = $this->errorMessages()[$rule];
        foreach($params as $key => $value){
            $errorMessage = str_replace("{{$key}}", $value, $errorMessage);
        }
        $this->errors[$attribute][] = $errorMessage;
    }

    public function hasErrors(string $attribute){
        return $this->errors[$attribute] ?? false;
    }

    public function getFirstError(string $attribute){
        return $this->errors[$attribute][0] ?? "";
    }

}