<?php


namespace app\models;

use app\core\Model;

class UserModel extends Model
{
    public function addUser($login, $email, $password, $token)
    {
        $params = [
            'login' => $login,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_BCRYPT),
            'token' => $token
        ];
        $sql = 'INSERT INTO user(login, email, password, token, Confirmed) VALUES(:login, :email, :password, :token, "N")';
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

    public function verifyEmail($token)
    {
        $params = [
            'token' => $token
        ];
        $sql = 'SELECT COUNT(*) FROM user WHERE token = :token';
        $res = ($this->db->row($sql, $params));
        $res = array_shift($res);
        if (array_shift($res) === '1') {
            $sql = 'UPDATE user SET token = NULL, confirmed = "Y" WHERE token = :token';
            $this->db->query($sql, $params);
            return true;
        }
        return false;
    }

    public function userConfirmed($login)
    {
        $params = [
            'login' => $login
        ];
        $sql = 'SELECT Confirmed FROM user WHERE login = :login';
        $res = ($this->db->row($sql, $params));
        $res = array_shift($res);
        return array_shift($res) === 'Y';
    }
}