<?php

namespace app\core;

class InputField extends BaseField{
    public const TYPE_TEXT = "text";
    public const TYPE_PASSWORD = "password";
    public const TYPE_NUMBER = "number";

    public string $inputType;
    public Model $model;

    public function __construct(Model $model, string $attribute)
    {
        $this->inputType = self::TYPE_TEXT;
        parent::__construct($model, $attribute);
    }

    public function renderInput() : string{
        $field = sprintf('
            <input type="%s" class="form-control %s" name="%s" value="%s">
    ', $this->inputType, $this->model->hasErrors($this->attribute) ? "is-invalid" : "", $this->attribute, $this->model->{$this->attribute});

        return $field;
    }

    public function passwordField(){
        $this->inputType = self::TYPE_PASSWORD;
        return $this;
    }
}