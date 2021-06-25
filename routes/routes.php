<?php

$main = 'app\controllers\MainController';
$account = 'app\controllers\AccountController';
$game = 'app\controllers\GameController';
return [
    //Main controller
    '/' => [
        'controller' => $main,
        'action' => 'index'
    ],
    '/about' => [
        'controller' => $main,
        'action' => 'about'
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
    //Game controller
    '/showgame/(\d+)' => [
        'controller' => $game,
        'action' => 'showgame'
    ]
];