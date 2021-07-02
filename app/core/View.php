<?php


namespace app\core;


class View
{
    private $path;
    private $layout = 'default';

    public function __construct($path)
    {
        $this->path = $path;
    }

    public function render($title, $vars = [])
    {
        extract($vars);
        ob_start();
        require $this->path;
        $content = ob_get_clean();
        require '../app/views/layouts/' . $this->layout . '.php';
    }
}