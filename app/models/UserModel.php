<?php


namespace app\models;

use app\core\Model;

class UserModel extends Model
{
    public function addUser($username, $email, $password, $token)
    {
        $params = [
            'username' => $username,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_BCRYPT),
            'token' => $token
        ];
        $sql = 'INSERT INTO user(username, email, password, token, Confirmed) VALUES(:username, :email, :password, :token, "N")';
        $this->db->query($sql, $params);
    }

    public function checkUserPassword($username, $password)
    {
        $params = [
            'username' => $username
        ];
        $sql = 'SELECT password FROM user WHERE username = :username';
        $hash = $this->db->row($sql, $params);
        $hash = array_shift($hash);
        return password_verify($password, $hash['password']);
    }

    public function userExists($username)
    {
        $params = [
            'username' => $username
        ];
        $sql = 'SELECT COUNT(*) FROM user WHERE username = :username';
        $res = ($this->db->row($sql, $params));
        $res = array_shift($res);
        return array_shift($res) === '1';
    }

    public function emailExists($email)
    {
        $params = [
            'email' => $email
        ];
        $sql = 'SELECT COUNT(*) FROM user WHERE email = :email';
        $res = ($this->db->row($sql, $params));
        $res = array_shift($res);
        return array_shift($res) === '1';
    }

    public function tryConfirmEmail($token)
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

    public function userConfirmed($username)
    {
        $params = [
            'username' => $username
        ];
        $sql = 'SELECT confirmed FROM user WHERE username = :username';
        $res = ($this->db->row($sql, $params));
        $res = array_shift($res);
        return array_shift($res) === 'Y';
    }

    public function resetPassword($password, $email){
        $params = [
            'password' => password_hash($password, PASSWORD_BCRYPT),
            'email' => $email
        ];
        $sql = 'UPDATE user SET password = :password WHERE email = :email';
        $this->db->query($sql, $params);
    }
}