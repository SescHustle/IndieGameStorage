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
        $this->db->doQuery($sql, $params);
    }

    public function checkUserPassword($username, $password)
    {
        $params = [
            'username' => $username
        ];
        $sql = 'SELECT password FROM user WHERE username = :username';
        $hash = $this->db->selectOneString($sql, $params);
        return password_verify($password, $hash['password']);
    }

    public function userExists($username)
    {
        $params = [
            'username' => $username
        ];
        $sql = 'SELECT username FROM user WHERE username = :username';
        return $this->db->selectIsNotEmpty($sql, $params);
    }

    public function emailExists($email)
    {
        $params = [
            'email' => $email
        ];
        $sql = 'SELECT email FROM user WHERE email = :email';
        return $this->db->selectIsNotEmpty($sql, $params);
    }

    public function tryConfirmEmail($token)
    {
        $params = [
            'token' => $token
        ];
        $sql = 'SELECT token FROM user WHERE token = :token';
        if($this->db->selectIsNotEmpty($sql, $params)) {
            $sql = 'UPDATE user SET token = NULL, confirmed = "Y" WHERE token = :token';
            $this->db->doQuery($sql, $params);
            return true;
        }
        return false;
    }

    public function userConfirmed($username)
    {
        $params = [
            'username' => $username
        ];
        $sql = 'SELECT confirmed FROM user WHERE username = :username AND confirmed = "Y"';
        return $this->db->selectIsNotEmpty($sql, $params);
    }

    public function resetPassword($password, $email){
        $params = [
            'password' => password_hash($password, PASSWORD_BCRYPT),
            'email' => $email
        ];
        $sql = 'UPDATE user SET password = :password WHERE email = :email';
        $this->db->doQuery($sql, $params);
    }
}