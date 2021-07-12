<?php


namespace app\controllers;


use app\core\Controller;
use app\core\View;
use app\views\PageView;

class StaticPageController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function aboutPageAction()
    {
        $page = new PageView('About', 'about', $this->access);
        $page->renderPage();
    }

    public function showErrorAction($code)
    {
        http_response_code($code);
        $this->view = new View('../app/views/errors/' . $code . '.php');
        $this->view->render('404 Error');
    }
}