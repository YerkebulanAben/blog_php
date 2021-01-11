<?php

class User
{
    public static function login($un, $pwd)
    {
        $db = new Db;
        $stmt = 'SELECT * FROM users WHERE username = :username';
        $db -> dbQuery($stmt, ['username' => $un]);
        $result = $db ->result;
        $error = '';
        if(empty($result))
        {
            $error = 'User does not exist';
            return [$result, $error];
        }
        if(!password_verify($pwd, $result['password']))
        {
            $error = 'Incorrect password';
            return [$result, $error];
        }

        return [$result];
        
    }

    public static function logout()
    {
        unset($_SESSION['status']);
    } 

    public static function register()
    {

    } 
}