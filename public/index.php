<?php

require_once "./../vendor/autoload.php";

use app\core\Application;

$app = new Application();

$app->router->get("/", "home");
$app->router->post("/", "home");

$app->run();
