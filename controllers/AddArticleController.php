<?php

class AddArticle
{
    public static function actionAdd()
    {
        if(isset($_POST['submit']) && $_SERVER['REQUEST_METHOD'] === 'POST')
        {
            $title = $_POST['title'];
            $content = $_POST['content'];
            $category = $_POST['category'];
            Article::addArticle($title, $content, $category);
            header('Location: ' . ROOT);
        }
        else
        {
            $cats = Category::getAllCategories();
            include_once('views/articles/add.php');
        }
    }
}