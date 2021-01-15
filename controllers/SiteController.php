<?php

class Site
{
    public function actionIndex()
    {
       $content = Article::showAllArticles();
       if($content === null)
        {
            include_once('views/articles/empty.php');
        }
        else include_once('views/articles/index.php');
    }
}
