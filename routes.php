<?php
return [
//Главная страница
'^$' => 'Site/Index', // название контроллера SiteController и метод в нем actionIndex
'^site/?$' => 'Site/Index',
'^article/([0-9].*)/?$' => 'ShowArticle/Index/$1',
//Страница ошибки
'.*' => 'Errors/Error404'
];