<?php


namespace app\views;


use app\core\View;

class PageView
{
    private $title;
    private $path;
    private $templateDir;
    private $vars = [];

    public function __construct($title, $name, $access, $vars = [])
    {
        $this->title = $title;
        $this->templateDir = '../app/views/templates/' . $access . '/';
        $this->path = $this->templateDir . $name . '.php';
        $this->vars = $vars;
    }

    public function renderPage()
    {
        extract($this->vars);
        $title = $this->title;
        ob_start();
        require $this->templateDir . 'header.php';
        require $this->path;
        require '../app/views/templates/footer.php';
        $content = ob_get_clean();
        require '../app/views/templates/global.php';
    }
}