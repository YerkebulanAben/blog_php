<?php

class Category
{
    public static function getAllCategories()
    {
        $db = new Db;
        $stmt = 'SELECT * FROM categories';
        $db -> dbQuery($stmt);
        return $db ->result;
    }
}