<?php


namespace app\controllers;
use app\core\Controller;

class MainController extends Controller
{
    public function indexAction()
    {
        $result = $this->model->getGames();
        $vars = [
            'games' => $result
        ];
        $this->view->render('Hello', $vars);
    }

    public function aboutAction()
    {
        $this->view->render('About');
    }
}