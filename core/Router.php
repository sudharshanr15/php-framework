<?php

namespace app\core;

class Router{
    // save all the valid incoming routes of the applicaion
    public array $routes = [];
    public Request $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

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
        $method = $this->request->getMethod();
        $path = $this->request->getPath();

        // handler if path doesn't exist
        $callback = $this->routes[$method][$path] ?? false;

        if($callback === false){
            return "Page not found";
        }

        // if $callback is a string return it directly
        if(is_string($callback)){
            return $callback;
        }

        if(is_array($callback)){
            $class = new $callback[0]();
            $callback[0] = $class;
            return call_user_func($callback);
        }

        // if $callback is a function, call them using a pre-defined function
        return call_user_func($callback);
    }
}