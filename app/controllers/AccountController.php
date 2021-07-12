<?php


namespace app\controllers;

use app\core\Controller;
use app\core\Validator;
use app\core\View;
use app\views\PageView;

class AccountController extends Controller
{
    public function __construct()
    {
        $this->model = $this->setModel('UserModel');
    }

    public function profilePageAction()
    {
        if (!$_SESSION['user']) {
            header('Location: /login');
        }
        if (isset($_POST['logout'])) {
            session_destroy();
            header('Location: /login');
        }
        $page = new PageView('Profile', 'profile', 'user');
        $page->renderPage();
    }

    public function confirmEmailAction()
    {
        $token = explode('/', $_SERVER['REQUEST_URI'])[2];
        if ($this->model->tryConfirmEmail($token)) {
            $page = new PageView('Email is confirmed', 'emailConfirmationSuccess', 'user');
            $page->renderPage();
        } else {
            echo '404';
        }
    }

    public function registerSuccessPageAction()
    {
        $page = new PageView('Registration success!', 'registrationSuccessful', 'user');
        $page->renderPage();
    }

    public function resetPasswordAction()
    {
        if (!isset($_SESSION['user'])) {
            $token = explode('/', $_SERVER['REQUEST_URI'])[2];
            if (isset($_SESSION['recoveryToken']) && $token === $_SESSION['recoveryToken']) {
                if (isset($_POST['resetPassword'])) {
                    $password = $_POST['password'];
                    $confirm = $_POST['confirm'];
                    $email = $_SESSION['passwordResetEmail'];
                    if ($password === $confirm && $password !== '') {
                        $this->model->resetPassword($password, $email);
                        $_SESSION['message'] = 'Password reset successful';
                        unset($_POST, $_SESSION['passwordResetEmail'], $_SESSION['recoveryToken']);
                        header('Location: /login');
                    } else {
                        $_SESSION['message'] = 'Passwords doesn\'t match';
                    }
                }
                $page = new PageView('Reset password', 'resetPassword', 'user');
                $page->renderPage();
            }
            header('Location: /profile');
        }
        header('Location: /profile');
    }
}