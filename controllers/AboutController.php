<?php

namespace app\controllers;

use app\core\Controller;

class AboutController extends Controller{
    public function about(){
        return $this->renderView("about.views");
    }
}