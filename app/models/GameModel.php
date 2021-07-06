<?php


namespace app\models;

use app\core\Model;

class GameModel extends Model
{

    public function getGames($search, $sort, $order, $categories)
    {
        $params = [
            'search' => $search,
        ];

        $whitelist = require '../config/sorts.php';
        if (!key_exists($sort, $whitelist)) {
            $sort = 'id';
        }
        if (!($order === 'ASC' || $order === 'DESC')) {
            $order = 'DESC';
        }
        $sql = 'SELECT * FROM games WHERE (name LIKE "%":search"%") OR (description LIKE "%":search"%") ORDER BY ' . $sort . ' ' . $order;
        return $this->db->query($sql, $params);
    }

    public function gameExists($gameid)
    {
        $params = [
            'id' => $gameid
        ];
        $sql = 'SELECT COUNT(*) FROM games WHERE id=:id';
        $res = ($this->db->row($sql, $params));
        $res = array_shift($res);
        return array_shift($res) == '1';
    }

    public function getData($gameid)
    {
        $params = [
            'id' => $gameid
        ];
        $sql = 'SELECT * FROM games WHERE id=:id';
        return $this->db->row($sql, $params);
    }
}