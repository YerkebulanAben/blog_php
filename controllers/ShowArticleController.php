<?php

class ShowArticle
{
    public function actionIndex($id)
    {
        $content = Article::showArticle($id);
        include_once('views/articles/article.php');
    } 
}