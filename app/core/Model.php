<?php


namespace app\core;
use database\Database;

abstract class Model
{
    public $db;

    public function __construct()
    {
        $this->db = new Database();
    }
}