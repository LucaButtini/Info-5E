<?php
session_start();

 $_SESSION['materia']= 'informatica'; // i dati sono agganciati alla sessione
 $_SESSION['scuola']= 'itis';

 ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <p>Homepage</p>
    <a href="sessionIndexTwo.php">Vai a session two</a>
</body>
</html>
