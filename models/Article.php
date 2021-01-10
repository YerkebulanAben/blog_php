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
        $stmt = 'SELECT * FROM articles WHERE id_article = :id';
        $db -> dbQuery($stmt,['id' => $id]);
        return $db ->result;
    }
}