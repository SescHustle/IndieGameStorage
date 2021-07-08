<?php


namespace app\controllers;

use app\core\Controller;
use app\core\Validator;
use app\core\View;

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
        $this->view = new View('../app/views/account/profile.php');
        $this->view->render('Profile');
    }

    public function verifyAction()
    {
        $token = explode('/', $_SERVER['REQUEST_URI'])[2];
        if ($this->model->verifyEmail($token)) {
            $this->view = new View('../app/views/account/verify.php');
            $this->view->render('Verification success');
        } else {
            echo '404';
        }
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
                $this->view = new View('../app/views/account/resetPassword.php');
                $this->view->render('Reset Password');
            }
            header('Location: /profile');
        }
        header('Location: /profile');
    }
}