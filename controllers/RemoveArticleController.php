<?php

class RemoveArticle
{
    public function actionRemove(string $id) : void
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
}