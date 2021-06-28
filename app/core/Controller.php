<?php


namespace app\core;

abstract class Controller
{
    public $view;
    public $model;

    protected function setModel($name)
    {
        $path = 'app\\models\\'. $name;
        if (class_exists($path)) {
            return new $path();
        }
    }
}