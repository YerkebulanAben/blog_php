<?php

class User
{
    public static function login(string $un, string $pwd, string $remember) : array
    {
        $db = new Db;
        $stmt = 'SELECT * FROM users WHERE username = :username';
        $db -> dbQuery($stmt, ['username' => htmlspecialchars($un)]);
        $result = $db ->result;
        // echo '<pre>';
        // var_dump($result);
        // echo '</pre>';
        $error = '';
        if(empty($result))
        {
            $error = 'User does not exist';
            return [$result, $error];
        }
        if(!password_verify($pwd, $result[0]['password']))
        {
            $error = 'Incorrect password';
            return [$result, $error];
        }
        if($remember)
        {
            $value = bin2hex(random_bytes(32));
            setcookie('rememberMe', $value, time() + 3600 * 24 * 30, '/');
            User::startSession($db, $result[0]['id_user'], $value);
        }
        $_SESSION['status'] = 'loggedIn';
        $_SESSION['user'] = $result[0]['id_user'];
        return [$result];
    }

    public static function logout() : void
    {
        $db = new Db;
        $stmt = 'DELETE FROM sessions WHERE id_user = :user';
        $db -> dbQuery($stmt, ['user' => $_SESSION['user']]);
        unset($_SESSION['status']);
        unset($_SESSION['user']);
        setcookie('rememberMe', $_COOKIE['rememberMe'], time() - 3600, '/');
    } 

    public static function register()
    {

    } 

    public static function startSession(Db $db, string $user, string $cookie) : void
    {
        $stmt = 'INSERT INTO sessions VALUES(DEFAULT,:cookie,:user)';
        $db->dbQuery($stmt, ['user' => $user, 'cookie' => $cookie]);
    }

    public static function checkSession(string $cookie) : bool
    {
        $db = new Db;
        $stmt = 'SELECT * FROM sessions WHERE cookie_value = :cookie';
        $db -> dbQuery($stmt, ['cookie' => htmlspecialchars($cookie)]);
        $result = $db->result;
        if(empty($result))
        {
            return false;
        }
        else return true;
    }
}