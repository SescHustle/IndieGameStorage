<?php


namespace database;

use PDO;

class Database
{
    protected $db;

    public function __construct()
    {
        $config = require '../config/dbconfig.php';
        $dbn = 'mysql:dbname=' . $config['dbname'] . ';host=' . $config['host'] . ';charset=utf8';
        $this->db = new PDO($dbn, $config['user'], $config['password']);
    }

    public function doQuery($sql, $params = [])
    {
        $statement = $this->db->prepare($sql);
        if (!empty($params)) {
            foreach ($params as $key => $val) {
                $statement->bindValue(':' . $key, $val);
            }
        }
        $statement->execute();
        return $statement;
    }

    public function selectAsArray($sql, $params = [])
    {
        $result = $this->doQuery($sql, $params);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function selectIsNotEmpty($sql, $params)
    {
        $select = $this->doQuery($sql, $params);
        return $select->rowCount();
    }

    public function selectOneString($sql, $params = [])
    {
        $result = $this->doQuery($sql, $params);
        return $result->fetch(PDO::FETCH_ASSOC);

    }
}