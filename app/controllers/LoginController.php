<?php


namespace app\controllers;


use app\core\Controller;
use app\core\View;
use app\core\Validator;

use app\views\PageView;

use function storage\generateRandomString;

class LoginController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->setModel('UserModel');
    }

    public function loginPageAction()
    {
        if (isset($_SESSION['user'])) {
            header('Location: /profile');
        } elseif (isset($_POST['LoginValidate'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            if ($this->tryLogin($username, $password)) {
                $this->doLogin($username);
            }
        }
        $page = new PageView('Log in', 'login', 'guest');
        $page->renderPage();
    }

    public function registerPageAction()
    {
        if (isset($_SESSION['user'])) {
            header("Location: /profile");
        } elseif (isset($_POST['RegisterValidate'])) {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirm = $_POST['confirm'];
            if ($this->tryRegister($username, $email, $password, $confirm)) {
                $token = generateRandomString();
                $this->model->addUser($username, $email, $password, $token);
                $_SESSION['user'] = $username;
                $_SESSION['unconfirmed'] = true;
                mail($email, 'Verify your email', $_SERVER['SERVER_NAME'] . '/verify/' . $token);
                header('Location: /register/success');
            }
        }
        $page = new PageView('Sign up', 'register', 'guest');
        $page->renderPage();
    }

    public function recoveryPageAction()
    {
        if (isset($_SESSION['user'])) {
            header("Location: /profile");
        } elseif (isset($_POST['Recovery'])) {
            $email = $_POST['email'];
            if ($this->model->emailExists($email)) {
                $token = generateRandomString();
                $message = 'To reset your password, follow the link: ' . $_SERVER['SERVER_NAME'] . '/recovery/' . $token;
                mail($email, 'Account recovery', $message);
                $_SESSION['passwordResetEmail'] = $email;
                $_SESSION['recoveryToken'] = $token;
                $_SESSION['message'] = 'We sent you instructions to recover your account. Please, check your email!';
            } else {
                $_SESSION['message'] = 'No user with this email';
            }
        }
        $page = new PageView('Account recovery', 'recovery', 'guest');
        $page->renderPage();
    }

    private function tryLogin($username, $password)
    {
        $validator = new Validator();
        $result = $validator->ValidateLoginData($username, $password);
        if ($result) {
            if ($this->model->userExists($username)) {
                if ($this->model->checkUserPassword($username, $password)) {
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

    private function tryRegister($username, $email, $password, $confirm)
    {
        $validator = new Validator();
        $result = $validator->ValidateRegisterData($username, $email, $password, $confirm);
        if ($result) {
            if ($this->model->userExists($username)) {
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

    private function doLogin($username)
    {
        $_SESSION['user'] = $username;
        if (!$this->model->userConfirmed($username)) {
            $_SESSION['unconfirmed'] = true;
        }
        header('Location: /profile');
    }
}