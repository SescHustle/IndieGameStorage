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
        if (!empty($categories)) {
            $sql = 'SELECT game.* FROM game LEFT JOIN game_category ON game.id = game_category.game_id
                LEFT JOIN category ON category.id = game_category.category_id WHERE (';
            for ($i = 1; $i <= count($categories); ++$i) {
                $params['category' . $i] = $categories[$i - 1];
                $sql = $sql . 'category.name = :category' . $i;
                if ($i !== count($categories)) {
                    $sql = $sql . ' OR ';
                }
            }
            $sql = $sql . ') GROUP BY game.id HAVING ((name LIKE "%":search"%") OR (description LIKE "%":search"%")) ORDER BY ' . $sort . ' ' . $order;
        } else {
            $sql = 'SELECT * FROM game WHERE (name LIKE "%":search"%") OR (description LIKE "%":search"%") ORDER BY ' . $sort . ' ' . $order;
        }
        return $this->db->selectAsArray($sql, $params);
    }

    public function gameExists($gameid)
    {
        $params = [
            'id' => $gameid
        ];
        $sql = 'SELECT id FROM game WHERE id=:id';
        return ($this->db->selectIsNotEmpty($sql, $params));
    }

    public function getData($gameid)
    {
        $params = [
            'id' => $gameid
        ];
        $sql = 'SELECT * FROM game WHERE id=:id';
        return $this->db->selectAsArray($sql, $params);
    }
}