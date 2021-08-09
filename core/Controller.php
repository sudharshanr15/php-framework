<?php

namespace app\core;

use app\core\View;

class Controller extends View{
    public function renderView($view, array $var = []){
        return parent::renderView($view, $var);
    }
}