<?php
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="myStyle.css">
    <title><?=/**@var $title*/ $title?></title>
</head>
<body>

<div class="topnav">
    <a href="home.php" class="<?=($_SERVER['PHP_SELF'] === '/5e/PDO/Views/home.php')? 'active' : ''?>">Home</a>
    <a href="news.php" class="<?=($_SERVER['PHP_SELF'] === '/5e/PDO/Views/news.php')? 'active' : ''?>">News</a>
    <a href="contact.php" class="<?=($_SERVER['PHP_SELF'] === '/5e/PDO/Views/contact.php')? 'active' : ''?>">Contact</a>
    <a href="about.php" class="<?=($_SERVER['PHP_SELF'] === '/5e/PDO/Views/about.php')? 'active' : ''?>">About</a>
</div>



