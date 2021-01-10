<?php

class RemoveArticle
{
    public function actionRemove($id)
    {
        Article::removeArticle($id);
    } 
}