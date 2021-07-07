<?php


namespace app\models;

use app\core\Model;

class UserModel extends Model
{
    public function addUser($login, $email, $password)
    {
        $params = [
            'login' => $login,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_BCRYPT)
        ];
        $sql = 'INSERT INTO user(login, email, password) VALUES(:login, :email, :password)';
        $this->db->query($sql, $params);
    }

    public function checkUserPassword($login, $password)
    {
        $params = [
            'login' => $login
        ];
        $sql = 'SELECT password FROM user WHERE login=:login';
        $hash = $this->db->row($sql, $params);
        $hash = array_shift($hash);
        return password_verify($password, $hash['password']);
    }

    public function userExists($login)
    {
        $params = [
            'login' => $login
        ];
        $sql = 'SELECT COUNT(*) FROM user WHERE login=:login';
        $res = ($this->db->row($sql, $params));
        $res = array_shift($res);
        return array_shift($res) === '1';
    }

    public function emailExists($email)
    {
        $params = [
            'email' => $email
        ];
        $sql = 'SELECT COUNT(*) FROM user WHERE email=:email';
        $res = ($this->db->row($sql, $params));
        $res = array_shift($res);
        return array_shift($res) === '1';
    }
}