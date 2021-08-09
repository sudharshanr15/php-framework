<?php

namespace app\controllers;

use app\core\Controller;

class SiteController extends Controller{
    public function home(){
        return $this->renderView("home.views", ['name'=>"something", "text"=>"This is a paragraph text."]);
    }

    public function about(){
        return $this->renderView("about.views");
    }

    public function contact(){
        return $this->renderView("contact.views");
    }
}