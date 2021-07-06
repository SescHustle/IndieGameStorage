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

    public function indexPageAction()
    {
        $sort = 'id';
        $order = 'DESC';
        $search = '';
        $categories = [];
        if (isset($_POST['sort'])) {
            $sort = $_POST['sort'];
        }
        if (isset($_POST['order'])) {
            $order = $_POST['order'];
        }
        if (isset($_POST['search'])) {
            $search = $_POST['search'];
        }
        if (isset($_POST['categories'])) {
            $categories = $_POST['categories'];
        }
        $result = $this->model->getGames($search, $sort, $order, $categories);
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
            echo '404';
        }
    }
}