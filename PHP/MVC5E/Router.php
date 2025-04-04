<?php

class Router
{
    private array $routes=[];

    public function addRoute($method,$url, $controller, $action):void{
        $this->routes[$method][$url]=[
            'controller'=> $controller,
            'action'=>$action
        ];
    }
}