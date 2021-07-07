<?php


namespace app\controllers;


use app\core\Controller;
use app\core\View;
use app\core\Validator;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->model = $this->setModel('UserModel');
    }

    public function loginPageAction()
    {
        if (isset($_SESSION['user'])) {
            header('Location: /profile');
        } elseif (isset($_POST['LoginValidate'])) {
            $login = $_POST['login'];
            $password = $_POST['password'];
            if ($this->tryLogin($login, $password)) {
                $_SESSION['user'] = $login;
                header('Location: /profile');
            }
        }
        $this->view = new View('../app/views/account/login.php');
        $this->view->render('Log in');
    }

    public function registerPageAction()
    {
        if (isset($_SESSION['user'])) {
            header("Location: /profile");
        } elseif (isset($_POST['RegisterValidate'])) {
            $login = $_POST['login'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirm = $_POST['confirm'];
            if ($this->tryRegister($login, $email, $password, $confirm)) {
                $this->model->addUser($login, $email, $password);
                $_SESSION['user'] = $login;
                header('Location: /profile');
            }
        }
        $this->view = new View('../app/views/account/register.php');
        $this->view->render('Sign up');
    }

    private function tryLogin($login, $password)
    {
        $validator = new Validator();
        $result = $validator->ValidateLoginData($_POST['login'], $_POST['password']);
        if ($result) {
            if ($this->model->userExists($login)) {
                if ($this->model->checkUserPassword($login, $password)) {
                    return true;
                } else {
                    $_SESSION['message'] = 'Incorrect password';
                    return false;
                }
            } else {
                $_SESSION['message'] = 'No such user registered';
                return false;
            }
        }
        $_SESSION['message'] = 'All fields must be filled';
        return false;
    }

    /**
     * @param $login
     * @param $email
     * @param $password
     * @param $confirm
     * @return bool
     */
    private function tryRegister($login, $email, $password, $confirm)
    {
        $validator = new Validator();
        $result = $validator->ValidateRegisterData($login, $email, $password, $confirm);
        if ($result) {
            if ($this->model->userExists($login)) {
                $_SESSION['registerMessages'][] = 'Username is taken';
            }
            if ($this->model->emailExists($email)) {
                $_SESSION['registerMessages'][] = 'Email is taken';
            }
            if ($password !== $confirm) {
                $_SESSION['registerMessages'][] = 'Passwords doesn\'t match';
            }
        }
        return empty($_SESSION['registerMessages']);
    }
}