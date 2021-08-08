<?php

require_once "./../vendor/autoload.php";

use app\core\Application;

$app = new Application();

$app->router->get("/", function(){echo "This is a home page";});
$app->router->get("/about", function(){echo "This is about page";});

$app->run();
