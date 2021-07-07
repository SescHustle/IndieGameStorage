<?php


namespace app\controllers;

use app\core\Controller;
use app\core\View;

class AccountController extends Controller
{
    public function __construct()
    {
        $this->model = $this->setModel('UserModel');
    }

    public function profilePageAction()
    {
        if (!$_SESSION['user']){
            header('Location: /login');
        }
        if(isset($_POST['logout'])){
            session_destroy();
            header('Location: /login');
        }
        $this->view = new View('../app/views/account/profile.php');
        $this->view->render('Profile');
    }

    public function verifyAction(){
        $token = explode('/', $_SERVER['REQUEST_URI'])[2];
        if ($this->model->verifyEmail($token)){
            $this->view = new View('../app/views/account/verify.php');
            $this->view->render('Verification success');
        }
        else echo '404';
    }
}