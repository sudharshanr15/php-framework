<?php

include_once "./vendor/autoload.php";

use app\core\Application;

$app = new Application(__DIR__);
$app->db->checkMigrations();