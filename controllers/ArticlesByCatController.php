<?php

class ArticlesByCat
{
    public function actionShowArticlesByCat(string $id_cat) : void
    {
        $content = Article::articlesByCat($id_cat);
        $category = Category::getCategory($id_cat);
        if($content === null && $category !== null)
        {
            include_once('views/articles/empty.php');
        }
        elseif($content === null && $category === null)
        {
            $error = new Errors;
            $error ->actionError404();
        }
        else include_once('views/articles/index.php');
    } 
}