<?php

class AddArticle
{
    public static function actionAdd()
    {
        $title = '';
        $content = '';
        $category = '';
        if(isset($_POST['submit']) && $_SERVER['REQUEST_METHOD'] === 'POST')
        {
            $errors = [];
            $title = $_POST['title'];
            $content = $_POST['content'];
            $category = $_POST['category'];
            $un = $_SESSION['user'];
            if(strlen($title) <= 2)
            {
                if($title === '') $errors[] = 'Empty title';
                else $errors[] = 'Title must is too short. It must be longer than 2 characters'; 
            }
            if(strlen($content) <= 10)
            {
                if($content  === '') $errors[] = 'Article content can not be empty';
                else $errors[] = 'Article content is too short. It must longer than 10 symbols';
            }
            if(empty($errors))
            {
                Article::addArticle($title, $content, $category, $un);
                header('Location: ' . ROOT);
            }
            else
            {
                $cats = Category::getAllCategories();
                include_once('views/articles/add.php');
            }
            
        }
        else
        {
            $cats = Category::getAllCategories();
            include_once('views/articles/add.php');
        }
    }
}