<?php

$game = 'app\controllers\GameController';
$account = 'app\controllers\AccountController';
$login = 'app\controllers\LoginController';
$static = 'app\controllers\StaticPageController';
return [
    '/' => [
        'controller' => $game,
        'action' => 'mainPage'
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
    '/recovery' => [
        'controller' => $login,
        'action' => 'recovery'
    ],
    '/register/success' => [
        'controller' => $account,
        'action' => 'registerSuccessPage'
    ],
    '/recovery/(\w+)' => [
        'controller' =>  $account,
        'action' => 'resetPassword'
    ],
    '/profile' => [
        'controller' => $account,
        'action' => 'profilePage'
    ],
    '/confirm/(\w+)' => [
        'controller' => $account,
        'action' => 'confirmEmail'
    ],
    '/about' => [
        'controller' => $static,
        'action' => 'aboutPage'
    ]
];