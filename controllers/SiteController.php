<?php

class Site
{
    public function actionIndex()
    {
       $content = Article::showAllArticles();
       include_once('views/articles/index.php');
    }
}
