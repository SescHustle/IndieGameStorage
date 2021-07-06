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
        if (isset($_SESSION['user'])){
            header("Location: /profile");
        }
        $this->view = new View('../app/views/account/login.php');
        $this->view->render('Log in');
        $login = $_POST['login'];
        $password = $_POST['password'];
        if ($this->model->userDataCorrect($login, $password)){
            $_SESSION['user'] = $login;
            header("Location: /profile");
        };
    }

    public function registerPageAction()
    {
        if (isset($_SESSION['user'])){
            header("Location: /profile");
        }
        $this->view = new View('../app/views/account/register.php');
        $this->view->render('Sign up');
        $this->checkRegistration();
    }

    public function checkRegistration()
    {
        $login = $_POST['login'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirm = $_POST['confirm'];
        if ($password === $confirm) {
            if (!($this->model->loginOrEmailIsTaken($login, $email))) {
                $this->model->addUser($login, $email, $password);
                echo 'Success';
            } else {
                echo 'User with this login or email already exists';
            }
        } else {
            echo 'passwords doesnt match';
        }
    }

    public function profilePageAction()
    {
            $this->view = new View('../app/views/account/profile.php');
            $this->view->render('Profile');
    }
}