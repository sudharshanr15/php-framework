<?php

namespace app\core;

class Router{
    // save all the valid incoming routes of the applicaion
    public array $routes = [];

    // route GET method
    public function get($path, $callback){
        $this->routes['get'][$path] = $callback;
    }

    // route POST method
    public function post($path, $callback){
        $this->routes['post'][$path] = $callback;
    }

    // resolve the routes when the uri matches the routes array by calling a callback
    public function resolve(){
        return "yet to resolve";
    }
}