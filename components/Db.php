<?php

class Db
{
    private static  PDO $db;
    private PDOStatement $query;
    public array $result = [];
    public array $errors = [];

    private function dbConnect() : PDO
    {
        $creds = require_once('configs/db_credentials.php');

        if(!isset($this::$db))
        {
            $this::$db = new PDO($creds['dsn'], $creds['username'], $creds['password'], $creds['options']);
            return $this::$db; 
        }
        return $this::$db;
    }

    public function dbQuery(string $stmt, array $params = []) : void
    {

        $this -> dbConnect();
        $this -> query = $this::$db -> prepare($stmt);
        $this -> query -> execute($params);
        //print_r($this -> query -> errorInfo());
        if($this -> dbCheckErrors())
        {
            $error = new Errors;
            $error -> actionError500();
        }
        else 
        {
            // if($this -> query -> rowCount() > 1)
            // {
            //     $this -> result = $this -> query -> fetchAll();
            // }
            // else
            // {
            //     $this -> result = $this -> query -> fetch();   
            // }
            while($row = $this->query->fetch())
            {
                $this ->result[] = $row;
            }
        }
    }

    private function dbCheckErrors() : bool
    {
        if($this -> query -> errorInfo()[1])
        {
            return true;
        }
        else return false; 
    }

    public function dbGetRowCount() : int
    {
        return $this -> query -> rowCount();
    }
}