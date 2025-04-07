<?php

namespace Router;
class Router
{
    private array $routes = [];

    //mappo con l'array associativo in modo da mandarmi con l'url dentro una classe e il metodo richiesto
    public function addRoute($method, $url, $controller, $action): void
    {
        $this->routes[$method][$url] = [
            'controller' => $controller,
            'action' => $action
        ];
    }

    public function match($url, $method): array
    {
        $values = [];
        // vado a vedere se dentro c'è la chiave dell'url che inserisco nel browser
        if (array_key_exists($url, $this->routes[$method])) {
            $values['controller'] = $this->routes[$method][$url]['controller'];
            $values['action'] = $this->routes[$method][$url]['action'];
        }
        return $values;
    }

    // metodo di prova per debug
    /*public function prova(){
        var_dump($this->routes);
    }*/
}