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
        $result = $this->model->getGames();
        $vars = [
            'games' => $result
        ];
        $this->view = new View('../app/views/main/index.php');
        $this->view->render('Hello', $vars);
    }

    public function aboutAction()
    {
        $this->view = new View('../app/views/main/about.php');
        $this->view->render('About');
    }
}