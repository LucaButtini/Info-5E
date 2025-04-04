<?php
// ritorna l'url del progetto, "url al netto del dominio localhost"
$url = $_SERVER['REQUEST_URI'];
//metodo
$method = $_SERVER['REQUEST_METHOD'];
//echo $url;
//echo '<br>';
//echo $method;
//echo '<br>';
// tolgo mvc per questione di comodità e lo rendiamo case sensitive con il replace
$url=trim(str_replace('5e/MVC5E','',$url),'/');
//echo $url;
echo '<br>';
/*/MVC5E/index.php
index.php*/

//echo 'ciao sono index'.'<br>';
/*ho configurato il server in modo da visualizzare nonostante cambio url */

//prima versione del router
// esempi per capire cosa c'è nell'array associativo
// 'home/index'  url che scrivo nel browser
// ProductController è una classe
// "action"=>"show1" chiave e valore di metodi nella classe
/*$routes = [
    'GET' =>[
        'home/index' => ["controller"=>"HomeController", "action"=>"presentation1"],
        'home/products' => ["controller"=>"ProductController", "action"=>"show1"],
        'home/services' => ["controller"=>"ServiceController", "action"=>"presentation3"]
    ],
    'POST'=>[
        'home/index' => ["controller"=>"HomeController", "action"=>"presentation11"],
        'home/products' => ["controller"=>"ProductController", "action"=>"show11"],
        'home/services' => ["controller"=>"ServiceController", "action"=>"presentation33"]
    ]
    ];*/
require 'Router.php';

$routerClass= new Router();
$routerClass->addRoute('GET', 'home/index', 'HomeController', 'presentation1');
$routerClass->addRoute('GET', 'home/index', 'HomeController', 'presentation1');
$routerClass->addRoute('GET', 'home/index', 'HomeController', 'presentation1');


$controller = $routes[$method][$url]['controller'];
//echo $controller;
$action = $routes[$method][$url]['action'];
//echo $action;
require $controller.'.php';
$controllerObj= new $controller();
$controllerObj->$action();