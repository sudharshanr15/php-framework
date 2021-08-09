<?php

namespace app\controllers;

use app\core\Controller;

class HomeController extends Controller{
    public function home(){
        return $this->renderView("home.views", ['name'=>"something", "text"=>"This is a paragraph text."]);
    }
}