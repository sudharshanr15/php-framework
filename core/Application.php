<?php

namespace app\core;

class Application{
    public Router $router;

    public function __construct()
    {
        $this->router = new Router();
    }

    public function run(){
        // only one echo in this statement due to all the functions have a return
        echo $this->router->resolve();
    }
}