<?php


namespace app\models;


use app\core\Model;

class AccountModel extends Model
{
    public function addUser($login, $email, $password){
        $params = [
          'login' => $login,
          'email' => $email,
          'password' => password_hash($password, PASSWORD_BCRYPT)
        ];
        $sql = 'INSERT INTO user(login, email, password) VALUES(:login, :email, :password)';
        $this->db->query($sql, $params);
    }

    public function userExists($login, $email){
        $params = [
            'login' => $login,
            'email' => $email
        ];
        $sql = 'SELECT COUNT(*) FROM user WHERE (login=:login OR email=:email)';
        $res = $this->db->row($sql, $params);
        $res = array_shift($res);
        return array_shift($res) == '1';
    }

    public function checkUserPassword($password){
        //
        return false;
    }

}