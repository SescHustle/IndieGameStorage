<?php


namespace app\models;

use app\core\Model;

class MainModel extends Model
{
    /*
     * loads all games from database
     * @return array
     */
    public function getAllGames()
    {
        return $this->sortGames();
    }

    /*
     * Sorting all games in a required order
     * @return array
     */
    public function sortGames()
    {
        $sql = 'SELECT * FROM games';
        if (isset($_POST['sort']) == 'rating') {
            $sql = 'SELECT * FROM games ORDER BY rating DESC';
        }
        if (isset($_POST['sort']) == 'downloads') {
            $sql = 'SELECT * FROM games ORDER BY downloads DESC';
        }
        return $this->db->row($sql);
    }

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
        $sql = "SELECT * FROM games WHERE id=$gameid";
        return $this->db->row("SELECT * FROM games WHERE id=$gameid");
    }
}