<?php
$appConfig= require 'appConfig.php';
$url = $_SERVER['REQUEST_URI'];
$method =$_SERVER['REQUEST_METHOD'];
//echo $url;
//echo '<br>';
$url=strtolower($url);
$url=trim(str_replace($appConfig['prjName'],'',$url),'/');
//echo $url;

//$routes=[
//    'GET'=>[
//        'home/index' =>["controller"=>"HomeController", "action"=>"presentation1"],
//        'home/products' => ["controller"=>"ProductController", "action"=>"show1"],
//        'home/services'=> ["controller"=>"ServiceController", "action"=>"presentation3"]
//        ],
//    'POST'=>[
//        'home/index' =>["controller"=>"HomeController", "action"=>"presentation11"],
//        'home/products' => ["controller"=>"ProductController", "action"=>"show11"],
//        'home/services'=> ["controller"=>"ServiceController", "action"=>"presentation33"]
//    ]
//];
/*database connection*/
require "Database\DBconn.php";
$dataBaseConfig= require "Database/databaseConfig.php";
$db =Database\DBconn::getDB($dataBaseConfig);

require 'Router/Router.php';
$routerClass = new \Router\Router();
$routerClass->addRoute('GET','home/index','HomeController','presentation1');
$routerClass->addRoute('GET','home/products','ProductController','show1');
$routerClass->addRoute('GET','home/services','ServiceController','presentation3');
$routerClass->addRoute('GET','show/tablet','ProductController','showAllTablet');  /*PER VISULIZZARE TUTTI I TABLET*/
$routerClass->addRoute('GET','form/insert/tablet','ProductController','formInsertOneTablet'); /*PER VISULIZZARE IL FORM DI INSERIMENTO TABLET*/
$routerClass->addRoute('GET','error/errorpage','HomeController','showErrorPage');  /*PAGINA DI ERRORE PERSONALIZZABILE CON $CONTENT*/


$routerClass->addRoute('POST','insert/onetablet','ProductController','insertOneTablet'); /*PER INSERIRE IL TABLET NEL DB (ACTION DEL FORM-INSERT-ONE-TABLET)*/
$routerClass->addRoute('POST','home/index','HomeController','presentation11');
$routerClass->addRoute('POST','home/products','ProductController','show11');
$routerClass->addRoute('POST','home/services','ServiceController','presentation33');


//var_dump($routes[$method]);
//var_dump($routes[$method][$url]);
//$controller=$routes[$method][$url]['controller'];
//echo $controller;
//echo'<br>';
//$action=$routes[$method][$url]['action'];
//echo $action;
$reValue=$routerClass->match($url,$method);
if(empty($reValue)) {
    http_response_code(404);
    die('Pagina non trova');
}
$controller= 'App\Controller\\'.$reValue['controller'];
$action = $reValue['action'];

require $controller.'.php';
$controllerObj = new $controller($db);
$controllerObj->$action();