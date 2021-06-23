<?php
require_once '../storage/debug.php';
require_once '../storage/autoload.php';

use app\core\Router;

session_start();
$r = new Router();
$r->run();
