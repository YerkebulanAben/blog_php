<?php

class ShowArticle
{
    public function actionIndex(string $id) : void
    {
        $content = Article::showArticle($id);
        $author = Article::checkAuthor($id, @$_SESSION['user']);
        if($content === null)
        {
            $error = new Errors;
            $error -> actionError404();
        }
        include_once('views/articles/article.php');
    } 
}