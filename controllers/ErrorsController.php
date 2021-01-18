<?php

class Errors
{
    public function actionError404() : void
    {
        http_response_code(404);
        include_once('views/errors/error404.php');
        exit();
    }

    public function actionError500() : void
    {
        http_response_code(500);
        include_once('views/errors/error500.php');
        exit();
    }

    public function actionError401() : void
    {
        http_response_code(401);
        include_once('views/errors/error401.php');
        exit();
    }
}