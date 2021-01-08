<?php

function controllerLoader(string $classname) : void
{
    $path = "controllers/{$classname}Controller.php";
    if(file_exists($path))
    {
        require_once($path);
    }    
}

function modelLoader(string $classname) : void
{
    $path = "models/{$classname}.php";
    if(file_exists($path))
    {
        require_once($path);
    }  
}

function componentLoader(string $classname) : void
{
    $path = "components/{$classname}.php";
    if(file_exists($path))
    {
        require_once($path);
    }  
}

spl_autoload_register('controllerLoader');
spl_autoload_register('modelLoader');
spl_autoload_register('componentLoader');
