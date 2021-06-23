<?php


namespace app\models;


use app\core\Model;

class GameModel extends Model
{
    public function gameExists($gameid)
    {
        return ($this->db->query("SELECT EXISTS(SELECT 1 FROM games WHERE id=$gameid"));
    }

    public function getData($gameid)
    {
        return $this->db->row("SELECT * FROM games WHERE id=$gameid");
    }
}