<?php

class Article
{
    public static function showAllArticles()
    {
        $db = new Db;
        $stmt = 'SELECT * FROM articles';
        $db -> dbQuery($stmt);
        return $db ->result;
    }

    public static function showArticle($id)
    {
        $db = new Db;
        $stmt = 'SELECT a.*, b.title as cat_title FROM articles a INNER JOIN categories b ON a.id_cat = b.id_cat 
        WHERE id_article = :id';
        $db -> dbQuery($stmt,['id' => $id]);
        return $db ->result;
    }
}