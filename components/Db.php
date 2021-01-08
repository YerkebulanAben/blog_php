<?php

class Db
{
    private static $db;
    private $query;
    public $result;
    public $errors = [];

    private function dbConnect()
    {
        $creds = require_once('configs/db_credentials.php');

        if(!isset($this::$db))
        {
            $this::$db = new PDO($creds['dsn'], $creds['username'], $creds['password'], $creds['options']);
            return $this::$db; 
        }
        return $this::$db;
    }

    public function dbQuery($stmt, $params = [])
    {
        $this -> dbConnect();
        $this -> query = $this::$db -> prepare($stmt);
        $this -> query -> execute($params);
        if($this -> dbCheckErrors())
        {
            $error = new Errors;
            $error -> actionError500();
        }
        else $this -> result = $this -> query -> fetchAll();
    }

    private function dbCheckErrors()
    {
        if($this -> query -> errorInfo()[1])
        {
            return true;
        }
        else return false; 
    }
}