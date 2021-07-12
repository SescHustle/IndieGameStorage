<?php


namespace app\core;


class Validator
{

    public function ValidateLoginData($username, $password)
    {
        return ($username !== '' && $password !== '');
    }

    public function ValidateRegisterData($username, $email, $password, $confirm)
    {
        if ($username === '' || $password === '' || $email === '' || $confirm === '') {
            $_SESSION['registerMessages'][] = 'All fields must be filled';
        }
        $this->validateUsername();
        $this->validatePassword($password);
        return empty($_SESSION['registerMessages']);
    }

    private function validateUsername()
    {
        //
    }

    private function validatePassword($password)
    {
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number = preg_match('@[0-9]@', $password);
        $passlen = 8;
        if (!$uppercase) {
            $_SESSION['registerMessages'][] = 'Password must contain at least one uppercase letter';
        }
        if (!$lowercase) {
            $_SESSION['registerMessages'][] = 'Password must contain at least one lowercase letter';
        }
        if (!$number) {
            $_SESSION['registerMessages'][] = 'Password must contain at least one number';
        }
        if ((strlen($password) < $passlen)) {
            $_SESSION['registerMessages'][] = 'Password must contain at least ' . $passlen . ' symbols';
        }
    }
}