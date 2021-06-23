<?php


namespace app\models;


use app\core\Model;

class GameModel extends Model
{
    public function gameExists($gameid)
    {
        $sql = "SELECT COUNT(*) FROM games WHERE id=$gameid";
        $res = ($this->db->row($sql));
        return $res[0]['COUNT(*)'] == '1';
        //HARDCODED
    }

    public function getData($gameid)
    {
        return $this->db->row("SELECT * FROM games WHERE id=$gameid");
    }
}