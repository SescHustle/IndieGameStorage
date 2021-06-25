<?php


namespace app\models;
use app\core\Model;

class MainModel extends Model
{
    /*
     * loads all games from database
     * @return array
     */
    public function getGames()
    {
        return $this->db->row('SELECT * FROM games');
    }
}