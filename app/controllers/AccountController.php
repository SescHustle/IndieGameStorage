<?php


namespace app\controllers;
use app\core\Controller;
use app\core\View;

class AccountController extends Controller
{
    public function __construct()
    {
        $this->model = $this->setModel('AccountModel');
    }

    public function loginAction()
    {
        $this->view = new View('../app/views/account/login.php');
        $this->view->render('Log in');
    }

    public function registerAction()
    {
        $this->view = new View('../app/views/account/register.php');
        $this->view->render('Sign up');
    }
}