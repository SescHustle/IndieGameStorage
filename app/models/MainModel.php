<?php


namespace app\models;
use app\core\Model;

class MainModel extends Model
{
    public function getGames()
    {
        return $this->db->row('SELECT * FROM games');
    }
}