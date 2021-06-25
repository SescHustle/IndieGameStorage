<?php


namespace app\models;


use app\core\Model;

class GameModel extends Model
{
    /*
     * checking if game page with this id exist
     * @param int gameid
     * @return bool
     */
    public function gameExists($gameid)
    {
        $sql = "SELECT COUNT(*) FROM games WHERE id=$gameid";
        $res = ($this->db->row($sql));
        $res = array_shift($res);
        return array_shift($res) == '1';
    }

    /*
     * extracts game data from database
     * @param int gameid
     * @return array
     */
    public function getData($gameid)
    {
        return $this->db->row("SELECT * FROM games WHERE id=$gameid");
    }
}