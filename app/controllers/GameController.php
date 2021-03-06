<?php


namespace app\controllers;

use app\core\Controller;
use app\core\View;
use app\views\PageView;

class GameController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->setModel('GameModel');
    }

    public function mainPageAction()
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
        $games = $this->model->getGames($search, $sort, $order, $categories);
        $best = $this->model->getBestGames();
        $vars = [
            'games' => $games,
            'best' => $best
        ];
        $page = new PageView('Main', 'main', $this->access, $vars);
        $page->renderPage();
    }

    public function showgameAction()
    {
        $id = explode('/', $_SERVER['REQUEST_URI'])[2];
        if ($this->model->gameExists($id)) {
            $arg = $this->model->getData($id);
            $arg = array_shift($arg);

            $page = new PageView($arg['name'], 'showgame', $this->access, $arg);
            $page->renderPage();
        } else {
            echo '404';
        }
    }
}