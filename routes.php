<?php
return [
//Главная страница
'^$' => 'Site/Index', // название контроллера SiteController и метод в нем actionIndex
'^site/?$' => 'Site/Index',
//Страница ошибки
'.*' => 'Errors/Error404'
];