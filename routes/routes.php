<?php
return [
    //Main controller
    '' => [
        'controller' => 'main',
        'action' => 'index'
    ],
    'about' => [
        'controller' => 'main',
        'action' => 'about'
    ],
    //Account controller
    'login' => [
        'controller' => 'account',
        'action' => 'login'
    ],
    'register' => [
        'controller' => 'account',
        'action' => 'register'
    ],
    //Game controller
    'game/(\d+)' => [
        'controller' => 'game',
        'action' => 'game'
    ]
];