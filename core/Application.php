<?php

namespace app\core;

class Application{
    public Router $router;
    public Request $request;
    public View $view;

    public static $ROOT_DIR;

    public function __construct($rootDir)
    {
        self::$ROOT_DIR = $rootDir;
        $this->view = new View();
        $this->request = new Request();
        $this->router = new Router($this->request);
    }

    public function run(){
        // only one echo in this statement due to all the functions have a return
        echo $this->router->resolve();
    }
}