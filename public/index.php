<?php

require_once "./../vendor/autoload.php";

use app\core\Application;
use app\controllers\HomeController;

$app = new Application();

$app->router->get("/", [HomeController::class, "home"]);
$app->router->get("/about", function(){echo "This is about page";});

$app->run();
