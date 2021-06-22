<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

function debug($str)
{
    echo '<p>';
    var_dump($str);
    echo '</p>';
    exit;
}