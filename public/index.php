<?php

require_once '../storage/debug.php';
require_once '../storage/autoload.php';
require_once '../storage/randomString.php';

use app\core\Router;

session_start();
$router = new Router();
$router->run();
