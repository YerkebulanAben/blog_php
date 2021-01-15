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

    public static function getCategory($id)
    {
        $db = new Db;
        $stmt = 'SELECT * FROM categories WHERE id_Cat = :id';
        $db ->dbQuery($stmt, ['id' => $id]);
        return $db ->result;
    } 
}