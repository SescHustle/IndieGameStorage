<?php


namespace app\controllers;
use app\core\Controller;

class AccountController extends Controller
{
    public function loginAction()
    {
        $this->view->render('Log in');
    }

    public function registerAction()
    {
        $this->view->render('Sign up');
    }
}