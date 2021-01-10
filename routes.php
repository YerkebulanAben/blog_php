<?php
return [
//Главная страница
'^$' => 'Site/Index', // название контроллера SiteController и метод в нем actionIndex
'^site/?$' => 'Site/Index',
//Работа со статьями
'^article/([0-9].*)/?$' => 'ShowArticle/Index/$1',
'^article/add/?$' => 'AddArticle/Add',
'^article/remove/([0-9].*)/?$' => 'RemoveArticle/Remove/$1',
//Страница ошибки
'.*' => 'Errors/Error404'
];