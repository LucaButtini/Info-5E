<?php
$appConf= require'appConfig.php';
// ritorna l'url del progetto, "url al netto del dominio localhost"
use Router\Router;

$url = $_SERVER['REQUEST_URI'];
//metodo
$method = $_SERVER['REQUEST_METHOD'];
//echo $url;
//echo '<br>';
//echo $method;
//echo '<br>';
// tolgo mvc per questione di comodità e lo rendiamo case sensitive
$url=strtolower($url);
$appConf['prName']=strtolower($appConf['prName']);
$url=trim(str_replace($appConf['prName'],'',$url),'/');
//echo $url;
echo '<br>';

require 'Router/Router.php';

$routerClass= new \Router\Router();
$routerClass->addRoute('GET', 'home/index', 'HomeController', 'presentation1');
$routerClass->addRoute('GET', 'home/products', 'ProductController', 'show1');
$routerClass->addRoute('GET', 'home/services', 'ServiceController', 'presentation3');
$routerClass->addRoute('POST', 'home/index', 'HomeController', 'presentation11');
$routerClass->addRoute('POST', 'home/products', 'ProductController', 'show11');
$routerClass->addRoute('POST', 'home/services', 'ServiceController', 'presentation33');

/*$routerClass->prova();
die();*/



$reValue= $routerClass->match($url, $method);
if(empty($reValue)){
    http_response_code(404);
    die('Pagina non trovata');
}
//sistemata col namespace
$controller= 'App\Controller\\'.$reValue['controller'];
$action= $reValue['action'];


require $controller.'.php';
$controllerObj= new $controller();
$controllerObj->$action();