<?php


namespace app\views;


use app\core\View;

class BlockView
{
    public static function renderGameTeaser($game){
        require '../app/views/templates/gameTeaser.php';
    }
    public static function renderGameCard($game){
        require '../app/views/templates/gameCard.php';
    }
}