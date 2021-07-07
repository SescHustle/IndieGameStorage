<?php

$game = 'app\controllers\GameController';
$account = 'app\controllers\AccountController';
$login = 'app\controllers\LoginController';
$static = 'app\controllers\StaticPageController';
return [
    '/' => [
        'controller' => $game,
        'action' => 'indexPage'
    ],
    '/showgame/(\d+)' => [
        'controller' => $game,
        'action' => 'showGame'
    ],
    '/login' => [
        'controller' => $login,
        'action' => 'loginPage'
    ],
    '/register' => [
        'controller' => $login,
        'action' => 'registerPage'
    ],
    '/profile' => [
        'controller' => $account,
        'action' => 'profilePage'
    ],
    '/about' => [
        'controller' => $static,
        'action' => 'aboutPage'
    ]
];