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

    public function loginPageAction()
    {
        $this->view = new View('../app/views/account/login.php');
        $this->view->render('Log in');
    }

    public function registerPageAction()
    {
        $this->view = new View('../app/views/account/register.php');
        $this->view->render('Sign up');
        $this->checkRegistration();
    }

    public function checkRegistration(){
        $login = $_POST['login'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirm = $_POST['confirm'];
        if ($password === $confirm){
            if (!($this->model->userExists($login, $email))){
                $this->model->addUser($login, $email, $password);
                echo 'Success';
            }else{
                echo 'User with this login or email already exists';
            }
        }else
        {
            echo 'passwords doesnt match';
        }
    }
}