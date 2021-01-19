<?php

class Comments
{
    public static function getComments(string $id) : array
    {
        $db = new Db;
        $stmt = 'SELECT c.*, u.username FROM comments c INNER JOIN users u ON c.id_user = u.id_user
        WHERE id_article = :id ORDER BY dt_add';
        $db -> dbQuery($stmt, ['id' =>htmlspecialchars($id)]);
        return $db ->result;
    }

    public static function addComment(string $id, string $un, string $text) : bool
    {
        $db = new Db;
        $stmt = 'INSERT INTO comments VALUES(DEFAULT, :text, :user, :id, DEFAULT)';
        $db ->dbQuery($stmt, ['text' => htmlspecialchars($text),
                              'user' => htmlspecialchars($un),
                              'id' => htmlspecialchars($id)]);
        return true;
    }  
}