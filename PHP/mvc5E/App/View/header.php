<?php
$appConfig= require dirname(__DIR__, 2) . '/appConfig.php';
$baseUrl = $appConfig['baseURL'].$appConfig['prjName'];
$href=$appConfig['baseURL'].$appConfig['prjName'].$appConfig['css'];
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?=$href?>">
    <title><?=$title?></title>
</head>
<body>
<div class="topnav">
    <a href="<?=$baseUrl?>show/tablet">ShowTablet</a>
    <a href="<?=$baseUrl?>form/insert/tablet">InsertTablet</a>
    <a href="<?=$baseUrl?>home/products">HomeProducts</a>
    <a href="<?=$baseUrl?>home/services">Service</a>
    <a href="<?=$baseUrl?>about">About</a>
</div>


