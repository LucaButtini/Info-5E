<?php
$appConfig= require dirname(__DIR__, 2) . '/appConfig.php'; //prendo la configurazione dell'app con le cartelle giuste
$baseUrl = $appConfig['baseURL'].$appConfig['prName'];
$href=$appConfig['baseURL'].$appConfig['prName'].$appConfig['css'];
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
    <a href="<?=$baseUrl?>/home/index">HomePage</a>
    <a href="<?=$baseUrl?>/home/products">HomeProducts</a>
    <a href="<?=$baseUrl?>/home/services">HomeService</a>
    <a href="<?=$baseUrl?>about">About</a>
</div>


