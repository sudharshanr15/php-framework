<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Request;
use app\models\RegisterModel;

class AuthController extends Controller{
    public function login(Request $request){
        if($request->isGet()){
            return $this->renderView("login.views");
        }else if($request->isPost()){
            return "Hello";
        }
    }

    public function register(Request $request){
        $register = new RegisterModel();
        if($request->isGet()){
            return $this->renderView("register.views", [
                "model"=> $register
            ]);
        }else if($request->isPost()){
            /** @var /app/core/Model $loadData */
            /** @var /app/core/Request $getBody */

            // $loadData is to save the defined input values in the class property
            // $getBody is to get all the arguments and values from the request
            $register->loadData($request->getBody());
            if($register->validate() && $register->save()){
                echo "Done";
                exit;
            }
            return $this->renderView("register.views", [
                "model"=> $register
            ]);                
        }
    }
}