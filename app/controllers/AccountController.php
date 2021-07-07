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
}