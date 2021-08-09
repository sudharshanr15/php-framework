<?php

require_once "./../vendor/autoload.php";

use app\core\Application;
use app\controllers\HomeController;
use app\controllers\AboutController;

$app = new Application(dirname(__DIR__));

$app->router->get("/", [HomeController::class, "home"]);
$app->router->get("/about", [AboutController::class, "about"]);

$app->run();
