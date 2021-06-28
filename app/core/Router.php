<?php


namespace app\core;

class Router
{
    public $routes = [];
    public $params = [];

    public function __construct()
    {
        $arr = require '../routes/routes.php';
        foreach ($arr as $key => $value) {
            $this->addRoute($key, $value);
        }
    }

    /*
     * fills routes[] from routes/router.php
     * @param string route
     * @param array params
     * return void
     */
    public function addRoute($route, $params)
    {
        $route = '#^' . $route . '$#';
        $this->routes[$route] = $params;
    }

    /*
     * checking if url route exists
     * @return bool
     */
    public function match()
    {
        $url = $_SERVER['REQUEST_URI'];
        foreach ($this->routes as $route => $params) {
            if (preg_match($route, $url, $matches)) {
                $this->params = $params;
                return true;
            }
        }
        return false;
    }

    /*
     * loads needed page
     * @return void
     */
    public function run()
    {
        if ($this->match()) {
            $controllerPath = $this->params['controller'];
            if (class_exists($controllerPath)) {
                $action = $this->params['action'] . 'Action';
                if (method_exists($controllerPath, $action)) {
                    $controller = new $controllerPath($this->params);
                    $controller->$action();
                } else {
                    $this->showError(404);
                }
            } else {
                $this->showError(404);
            }
        } else {
            $this->showError(404);
        }
    }

    private function showError($code)
    {
        $staticControllerPath = 'app\controllers\StaticController';
        $controller = new $staticControllerPath();
        $controller->showErrorAction($code);
    }
}