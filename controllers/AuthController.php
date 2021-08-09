<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Request;

class AuthController extends Controller{
    public function login(Request $request){
        if($request->isGet()){
            return $this->renderView("login.views");
        }else if($request->isPost()){
            return "Hello";
        }
    }

    public function register(Request $request){
        if($request->isGet()){
            return $this->renderView("register.views");
        }else if($request->isPost()){
            return "HEllo";
        }
    }
}