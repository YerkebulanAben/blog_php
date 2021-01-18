<?php

class Router
{
    private array $routes;

    private function getUrl() : string
    {
        $url = $_SERVER['REQUEST_URI'];

        return trim(str_replace(ROOT, '', $url), '/ ');
    }
    
    public function run() : void
    {
        $url = $this -> getUrl();
        //echo $url . '<br>';
        $routes = require_once('routes.php');
        foreach( $routes as $pattern => $route)
        {
            if(preg_match("~$pattern~", $url))
            //if(preg_replace("~$pattern~", $route, $url))
            {
                $route = preg_replace("~$pattern~", $route, $url);
                //var_dump($route);
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