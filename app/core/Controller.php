<?php


namespace app\core;

abstract class Controller
{
    protected $view;
    protected $model;
    protected $access;

    public function __construct(){
        $this->defineAccess();
    }

    protected function setModel($name)
    {
        $path = 'app\\models\\'. $name;
        if (class_exists($path)) {
            $this->model = new $path();
        }
    }

    protected function defineAccess(){
        if (isset($_SESSION['user'])){
            $this->access = 'user';
        }else{
            $this->access = 'guest';
        }
    }
}