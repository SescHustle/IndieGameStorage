<?php

$main = 'app\controllers\MainController';
$account = 'app\controllers\AccountController';
$static = 'app\controllers\StaticController';
return [
    //Main controller
    '/' => [
        'controller' => $main,
        'action' => 'index'
    ],
    '/index.php' => [
        'controller' => $main,
        'action' => 'index'
    ],
    '/showgame/(\d+)' => [
        'controller' => $main,
        'action' => 'showgame'
    ],
    //Account controller
    '/login' => [
        'controller' => $account,
        'action' => 'login'
    ],
    '/register' => [
        'controller' => $account,
        'action' => 'register'
    ],
    //static controller
    '/about' => [
        'controller' => $static,
        'action' => 'about'
    ]
];