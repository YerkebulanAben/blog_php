<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once('init.php');
session_start();

//echo @$_SESSION['status'] ? $_SESSION['status'] : 'loggedOut';

$router = new Router;
$router -> run();
