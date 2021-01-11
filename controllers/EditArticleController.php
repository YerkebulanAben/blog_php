<?php

class EditArticle
{
    public function actionEdit($id)
    {
        if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit']))
        {
            $title = $_POST['title'];
            $content = $_POST['content'];
            $category = $_POST['category'];
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
}