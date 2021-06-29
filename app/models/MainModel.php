<?php


namespace app\models;

use app\core\Model;
use http\Params;

class MainModel extends Model
{
    /*
     * loads all games from database
     * @return array
     */
    public function getAllGames($sort)
    {
        return $this->sortGames($sort);
    }

    /*
     * Sorting all games in a required order
     * @return array
     */
    private function sortGames($sort)
    {
        $sql = 'SELECT * FROM games';
        if ($sort === 'rating') {
            $sql = 'SELECT * FROM games ORDER BY rating DESC';
        }
        if ($sort === 'downloads') {
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
        $params = [
            'id' => $gameid
        ];
        $sql = "SELECT COUNT(*) FROM games WHERE id=:id";
        $res = ($this->db->row($sql, $params));
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
        $params = [
            'id' => $gameid
        ];
        $sql = "SELECT * FROM games WHERE id=:id";
        return $this->db->row($sql, $params);
    }
}