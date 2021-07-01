<?php


namespace app\controllers;


use app\core\Controller;
use app\core\View;

class StaticPageController extends Controller
{
    public function aboutPageAction()
    {
        $this->view = new View('../app/views/main/about.php');
        $this->view->render('About');
    }

    public function showErrorAction($code)
    {
        http_response_code($code);
        $this->view = new View('../app/views/errors/' . $code . '.php');
        $this->view->render('404 Error');
    }
}