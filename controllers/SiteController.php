<?php

class Site
{
    public function actionIndex() : void
    {
       $content = Article::showAllArticles();
       if($content === null)
        {
            include_once('views/articles/empty.php');
        }
        else include_once('views/articles/index.php');
    }

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

    public function actionEditArticle(string $id) : void
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

    public function actionRemoveArticle(string $id) : void
    {
        $un = $_SESSION['user'];
        $result = Article::removeArticle($id, $un);
        if($result === 0)
        {
            $error = new Errors;
            $error -> actionError401();
        }
        $_SESSION['articleRemoved'] = true;
        header('Location: ' . ROOT);
    }

    public function actionShowArticle(string $id) : void
    {
        $content = Article::showArticle($id);
        $author = Article::checkAuthor($id, @$_SESSION['user']);
        if($content === null)
        {
            $error = new Errors;
            $error -> actionError404();
        }
        include_once('views/articles/article.php');
    } 
}
