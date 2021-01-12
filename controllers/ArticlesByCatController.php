<?php

class ArticlesByCat
{
    public function actionShowArticlesByCat($id_cat)
    {
        $content = Article::articlesByCat($id_cat);
        include_once('views/articles/index.php');
    } 
}