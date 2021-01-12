<?php

class ShowArticle
{
    public function actionIndex($id)
    {
        $content = Article::showArticle($id);
        $author = Article::checkAuthor($id, @$_SESSION['user']);
        include_once('views/articles/article.php');
    } 
}