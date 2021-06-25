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
        require '../app/views/layouts/'.$this->layout.'.php';
    }

    /*
     * renders error page
     * @param int code
     * @return null
     */
    public static function showError($code)
    {
        http_response_code($code);
        require '../app/views/errors/'.$code.'.php';
    }
}