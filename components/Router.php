<?php

class Router
{
    private $routes;

    private function getUrl()
    {
        $url = $_SERVER['REQUEST_URI'];

        return trim(str_replace(ROOT, '', $url), '/ ');
    }
    
    public function run()
    {
        $url = $this -> getUrl();
        $routes = require_once('routes.php');
        foreach( $routes as $pattern => $route)
        {
            if(preg_match("~$pattern~", $url))
            //if(preg_replace("~$pattern~", $route, $url))
            {
                $route = preg_replace("~$pattern~", $route, $url);
                $components = explode('/', $route);
                if($components[0] === 'Auth')
                {
                    if(!$GLOBALS['session'])
                    {
                        $error = new Errors;
                        $error -> actionError401();
                    }
                    else unset($components[0]);
                }
                $controllerName = ucfirst(array_shift($components));
                $controllerAction = 'action' . ucfirst(array_shift($components));
                $params = $components;
                break;
            }
        }

        $controllerObject = new $controllerName;
        call_user_func_array([$controllerObject, $controllerAction], $params);
    }
}