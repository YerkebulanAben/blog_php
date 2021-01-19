<?php
return [
//Главная страница
'^$' => 'Site/Index', // название контроллера SiteController и метод в нем actionIndex
'^site/?$' => 'Site/Index',
//Работа со статьями
'^article/([0-9].*)/?$' => 'Site/ShowArticle/$1',
'^article/add/?$' => 'Auth/Site/AddArticle',
'^article/remove/([0-9].*)/?$' => 'Auth/Site/RemoveArticle/$1',
'^article/edit/([0-9].*)/?$' => 'Auth/Site/EditArticle/$1',
'^bycategory/([0-9].*)/?$' => 'Site/ShowArticlesByCat/$1',
//Пользователи
'^user/login/?$' => 'SiteUser/Login',
'^user/logout/?$' => 'SiteUser/Logout',
//Страница ошибки
'^.*$' => 'Errors/Error404'
];