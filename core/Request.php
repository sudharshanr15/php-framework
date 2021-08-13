<?php

namespace app\core;

class Request{
    public function getMethod(){ // get the request method
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    public function isGet(){ // check if request method is get
        return strtolower($_SERVER['REQUEST_METHOD']) === "get" ? true : false;
    }

    public function isPost(){ // check if request method is post
        return strtolower($_SERVER['REQUEST_METHOD']) === "post" ? true : false;
    }

    public function getPath(){ // get the request path
        $path = $_SERVER['REQUEST_URI'] ?? "/";
        $position = strpos($path, "?");
        if($position){
            return substr($path, 0, $position);
        }

        return $path;
    }

    public function getBody(){
        $body = [];

        if($this->isGet()){
            foreach($_GET as $key => $value){
                $body[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }

        if($this->isPost()){
            foreach($_POST as $key => $value){
                $body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }

        return $body;
    }
}