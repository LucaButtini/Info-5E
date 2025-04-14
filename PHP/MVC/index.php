<?php
$url = $_SERVER['REQUEST_URI'];//ritorna l'URL al netto del dominio del server
$method = $_SERVER['REQUEST_METHOD'];//ritorna il metodo
$appConfig = require 'appConfig.php';
//echo $method;
//echo $url;
//echo '<br>';
//stiamo rendendo
$url = strtolower($url);
$appConfig['prjName'] = strtolower($appConfig['prjName']);
$url=trim(str_replace($appConfig['prjName'],'',$url),'/');
//echo $url;
//creato un array associativo che contiene 4 array associativi incastrati l'uno dento l'altro
/*$routes = [
    'GET' =>[
        //URL DA SCRIVERE NEL BROWSER
        'home/index' =>["controller" =>"HomeController", "action" => "presentation1"],
        'home/products' => ["controller" =>"ProductionController", "action" => "sho1"],
    'home/services' => ["controller" =>"ServiceController", "action" => "presentation3"]
    ],
    'POST' =>[
        'home/index' =>["controller" =>"HomeController", "action" => "presentation11"],
        'home/products' => ["controller" =>"ProductionController", "action" => "shoW11"],
        'home/services' => ["controller" =>"ServiceController", "action" => "presentation33"]
    ]
];*/
/*database connection*/
require "Database\DBconn.php";
$databaseConfig = require "Database/databaseConfig.php";
$db = Database\DBconn::getDB($databaseConfig);

require 'Router/router.php';
$routerClass = new \Router\router();
$routerClass->addRoute('GET', 'home/index', 'HomeController', 'presentation1');
$routerClass->addRoute('GET', 'home/products', 'ProductController', 'show1');
$routerClass->addRoute('GET', 'home/services', 'ServiceController', 'presentation3');
$routerClass->addRoute('POST', 'home/index', 'HomeController', 'presentation11');
$routerClass->addRoute('POST', 'home/products', 'ProductController', 'show11');
$routerClass->addRoute('POST', 'home/services', 'ServiceController', 'presentation33');

$routerClass->addRoute('GET', 'show/tablet', 'ProductController', 'showAllTablet');


//var_dump([$routes[$method]]);//solo la parte dell'array dove c'è $method
//var_dump($routes[$method][$url]);//dentro il GET ma mi fa vedere solo 1 dei 3 URL
//$controller = $routes[$method][$url]['controller'];
//echo $controller;
//echo '<br>';
//$action = $routes[$method][$url]['action'];
//echo $action;


$reValue = $routerClass->match($url, $method);
if(empty($reValue)){
    http_response_code(404);
    die("pagina non trovata");
}
$controller = 'App\Controller\\'.$reValue['controller'];
$action = $reValue['action'];
require $controller.'.php';
$controllerOBJ = new $controller($db);//crea un oggetto di tipo controller
$controllerOBJ->$action();