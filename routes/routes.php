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
    '/register/success' => [
        'controller' => $login,
        'action' => 'registerSuccessPage'
    ],
    '/recovery' => [
        'controller' => $login,
        'action' => 'recovery'
    ],
    '/recovery/(\w+)' => [
        'controller' =>  $account,
        'action' => 'resetPassword'
    ],
    '/profile' => [
        'controller' => $account,
        'action' => 'profilePage'
    ],
    '/verify/(\w+)' => [
        'controller' => $account,
        'action' => 'verify'
    ],
    '/about' => [
        'controller' => $static,
        'action' => 'aboutPage'
    ]
];