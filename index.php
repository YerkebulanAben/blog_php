<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once('init.php');

$router = new Router;
$router -> run();
