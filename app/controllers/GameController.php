<?php


namespace app\controllers;

use app\core\Controller;
use app\core\View;

class GameController extends Controller
{
    public function __construct()
    {
        $this->model = $this->setModel('GameModel');
    }

    public function showgameAction()
    {
        $id = explode('/', $_SERVER['REQUEST_URI'])[2];
        if ($this->model->gameExists($id)) {
            $arg = $this->model->getData($id);
            $arg = array_shift($arg);
            $this->view = new View('../app/views/game/showgame.php');
            $this->view->render($arg['name'], $arg);
        }
        else
        {
            echo "404";
        }
    }
}