<?php


namespace app\models;

use app\core\Model;

class MainModel extends Model
{
    /*
     * loads all games from database
     * @param string search
     * @param string sort
     * @param string order
     *
     * @return array
     */
    public function getGames($search, $sort, $order, $categories)
    {
        $params = [
            'search' => $search,
            //'categories' => $categories
        ];
/*        $sql = 'SELECT DISTINCT games.* FROM games LEFT JOIN games_categories ON games.id = games_categories.game_id
                LEFT JOIN categories ON categories.id = games_categories.category_id';
        if (!empty($categories)) {
            $sql = $sql.' WHERE (';
            for ($i = 1; $i <= count($categories); ++$i) {
                $params['category' . $i] = $categories[$i - 1];
                $sql = $sql . "categories.name=':category'" . $i;
                if ($i !== count($categories))
                {
                    $sql = $sql.' OR ';
                }
            }
            $sql = $sql . ')';
        }
        todo: make filtration work, not forgetting SQL injections defence*/
        $whitelist = require '../database/sorts.php';
        if (!key_exists($sort, $whitelist)) {
            $sort = 'id';
            //todo: redirecting to 404
        }
        if (!($order === 'ASC' || $order === 'DESC')) {
            $order = 'DESC';
            //todo: redirecting to 404
        }
        $sql = 'SELECT * FROM games WHERE (name LIKE "%":search"%") OR (description LIKE "%":search"%") ORDER BY ' . $sort . ' ' . $order;
        return $this->db->query($sql, $params);
        //todo: sorting more than by one column
    }

    /*
     * checking if game page with this id exist
     * @param int gameid
     *
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
     *
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