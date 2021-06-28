<?php


namespace app\controllers;

use app\core\Controller;
use app\core\View;

class MainController extends Controller
{
    public function __construct()
    {
        $this->model = $this->setModel('MainModel');
    }

    public function indexAction()
    {
        $result = $this->model->getAllGames();
        $vars = [
            'games' => $result
        ];
        $this->view = new View('../app/views/main/index.php');
        $this->view->render('Main', $vars);
    }

    public function showgameAction()
    {
        $id = explode('/', $_SERVER['REQUEST_URI'])[2];
        if ($this->model->gameExists($id)) {
            $arg = $this->model->getData($id);
            $arg = array_shift($arg);
            $this->view = new View('../app/views/game/showgame.php');
            $this->view->render($arg['name'], $arg);
        } else {
            echo '404 todo';
        }
    }
}