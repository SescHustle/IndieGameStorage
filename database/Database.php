<?php


namespace database;

use PDO;
class Database
{
    protected $db;

    public function __construct()
    {
        $config = require '../database/dbconfig.php';
        $dbn = 'mysql:dbname='.$config['dbname'].';host='.$config['host'].';charset=utf8';
        $this->db = new PDO($dbn, $config['user'], $config['password']);
    }

    /*
     * making sql query for database
     * @param string sql
     * @param array params[]
     * @return PDO::statement
     */
    public function query($sql, $params = [])
    {
        $statement = $this->db->prepare($sql);
        if (!empty($params))
        {
            foreach ($params as $key => $val)
            {
                $statement->bindValue(':'.$key, $val);
            }
        }
        $statement->execute();
        return $statement;
    }

    /*
     * show query results as array
     * @param string sql
     * @param array params
     * @return array
     */
    public function row($sql, $params = [])
    {
        $result = $this->query($sql);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
}