<?php


namespace app\core;


class View
{
    public $path;
    public $layout = 'default';

    public function __construct($path)
    {
        $this->path = $path;
    }

    /*
     * renders page
     * @param string title
     * @param array vars[]
     * @return void
     */
    public function render($title, $vars = [])
    {
        extract($vars);
        ob_start();
        require $this->path;
        $content = ob_get_clean();
        require '../app/views/layouts/' . $this->layout . '.php';
    }
}