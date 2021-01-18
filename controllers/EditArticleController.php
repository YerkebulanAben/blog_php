<?php

class EditArticle
{
    public function actionEdit(string $id) : void
    {
        $title = '';
        $content = '';
        $category = '';
        if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit']))
        {
            $errors = [];
            $title = $_POST['title'];
            $content = $_POST['content'];
            $category = $_POST['category'];
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
                Article::editArticle($id, $title, $content, $category);
                header("Location: " . ROOT);
            }
            else
            {
                $article = Article::showArticle($id);
                $cats = Category::getAllCategories();
                include_once('views/articles/edit.php');
            }
        }
        else
        {
            $article = Article::showArticle($id);
            $cats = Category::getAllCategories();
            include_once('views/articles/edit.php');
        }
    }
}