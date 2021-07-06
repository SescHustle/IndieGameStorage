<?php

$game = 'app\controllers\GameController';
$account = 'app\controllers\AccountController';
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
        'controller' => $account,
        'action' => 'loginPage'
    ],
    '/register' => [
        'controller' => $account,
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