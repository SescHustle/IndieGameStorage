<?php
spl_autoload_register(function ($class)
{
    //define('ROOT', '../');
    $path = '../'.str_replace('\\','/', $class).'.php';
    if (file_exists($path))
    {
        require_once $path;
    }
});