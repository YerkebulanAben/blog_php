<?php
return [
//Главная страница
'^$' => 'Site/Index', // название контроллера SiteController и метод в нем actionIndex
'^site/?$' => 'Site/Index',
//Работа со статьями
'^article/([0-9].*)/?$' => 'ShowArticle/Index/$1',
'^article/add/?$' => 'Auth/AddArticle/Add',
'^article/remove/([0-9].*)/?$' => 'Auth/RemoveArticle/Remove/$1',
'^article/edit/([0-9].*)/?$' => 'Auth/EditArticle/Edit/$1',
'^bycategory/([0-9].*)/?$' => 'ArticlesByCat/ShowArticlesByCat/$1',
//Пользователи
'^user/login/?$' => 'SiteUser/Login',
'^user/logout/?$' => 'SiteUser/Logout',
//Страница ошибки
'^.*$' => 'Errors/Error404'
];