<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once('init.php');
session_start();

$session = false;
//echo @$_SESSION['status'] ? $_SESSION['status'] : 'loggedOut';
if(isset($_SESSION['status']) && $_SESSION['status'] === 'loggedIn')
{
    $session = true;
}

if(isset($_COOKIE['rememberMe']))
{
    $sessionResult = User::checkSession($_COOKIE['rememberMe']);
    if($sessionResult)
    {
        $session = true;
    }
}


$router = new Router;
$router -> run();
