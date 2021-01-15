<?php

class ArticlesByCat
{
    public function actionShowArticlesByCat($id_cat)
    {
        $content = Article::articlesByCat($id_cat);
        if($content === null)
        {
            include_once('views/articles/empty.php');
        }
        else include_once('views/articles/index.php');
    } 
}