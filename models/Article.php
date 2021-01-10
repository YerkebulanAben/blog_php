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
        $db -> dbQuery($stmt, ['id' => $id]);
        return $db ->result;
    }

    public static function addArticle($title, $content, $category)
    {
        $db = new Db;
        $stmt = 'INSERT INTO articles(title,content,id_cat) VALUES(:title,:content,:id_cat)';
        $db -> dbQuery($stmt, ['title' => $title, 'content' => $content, 'id_cat' => $category]);
        return true;
    }
    
    public static function removeArticle($id)
    {
        $db = new Db;
        $stmt = 'DELETE FROM articles WHERE id_article = :id';
        $db -> dbQuery($stmt,['id' => $id]);
        header('Location: /myprojects/zinchenko/blog_oop/');
    } 
}