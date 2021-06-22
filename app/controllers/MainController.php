<?php


namespace app\controllers;
use app\core\Controller;

class MainController extends Controller
{
    public function indexAction()
    {
        $this->view->render('Hello');
    }

    public function aboutAction()
    {
        $this->view->render('About');
    }
}