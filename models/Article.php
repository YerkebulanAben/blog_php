<?php

class Article
{
    public static function showAllArticles() : array
    {
        $db = new Db;
        $stmt = 'SELECT * FROM articles';
        $db -> dbQuery($stmt);
        return $db ->result;
    }

    public static function showArticle(string $id) : array
    {
        $db = new Db;
        $stmt = 'SELECT a.*, b.title as cat_title FROM articles a INNER JOIN categories b ON a.id_cat = b.id_cat 
        WHERE id_article = :id';
        $db -> dbQuery($stmt, ['id' => htmlspecialchars($id)]);
        return $db ->result;
    }

    public static function addArticle(string $title, string $content, string $category, string $un) : bool
    {
        $db = new Db;
        $stmt = 'INSERT INTO articles(title,content,id_cat,id_user) VALUES(:title,:content,:id_cat,:id_user)';
        $db -> dbQuery($stmt, ['title' => htmlspecialchars($title), 
                               'content' => htmlspecialchars($content), 
                               'id_cat' => htmlspecialchars($category), 
                               'id_user' => htmlspecialchars($un)]);
        return true;
    }
    
    public static function removeArticle(string $id, string $un) : int
    {
        $db = new Db;
        $stmt = 'DELETE FROM articles WHERE id_article = :id AND id_user = :id_user';
        $db -> dbQuery($stmt,['id' => htmlspecialchars($id), 
                              'id_user' => htmlspecialchars($un)]);
        return $db->dbGetRowCount();
    } 

    public static function editArticle(string $id, string $title, string $content, string $category) : bool
    {
        $db = new Db;
        $stmt = 'UPDATE articles SET title = :title, content = :content, id_cat = :cat WHERE id_article = :id';
        $db -> dbQuery($stmt, ['title' => htmlspecialchars($title),
                                'content' => htmlspecialchars($content),
                                'cat' => htmlspecialchars($category),
                                'id' => htmlspecialchars($id)]);
        return true;
    }

    public static function checkAuthor(?string $id, ?string $un) : bool
    {
        $db = new Db;
        $stmt = 'SELECT * FROM articles WHERE id_article = :id AND id_user = :id_user';
        $db -> dbQuery($stmt, ['id' => htmlspecialchars($id), 
                               'id_user' => htmlspecialchars($un)]);
        if($db ->dbGetRowCount() === 1)
        {
            return true;
        }
        else return false;
    }

    public static function articlesByCat(string $id_cat) : array
    {
        $db = new Db;
        $stmt = 'SELECT * FROM articles WHERE id_cat = :id_cat';
        $db -> dbQuery($stmt, ['id_cat' => htmlspecialchars($id_cat)]);
        return $db ->result;
    } 
}