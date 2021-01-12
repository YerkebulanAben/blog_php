<?php

class RemoveArticle
{
    public function actionRemove($id)
    {
        $un = $_SESSION['user'];
        $result = Article::removeArticle($id, $un);
        if($result === 0)
        {
            $error = new Errors;
            $error -> actionError401();
        }
        header('Location: ' . ROOT);
    } 
}