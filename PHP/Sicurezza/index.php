<?php

//ora sanifichiamo il dato
//$msg=$_GET["msg"] ?? '';

$msg=filter_input(INPUT_GET, 'msg', FILTER_SANITIZE_STRING);

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
    <p>primo</p>
    <p>secondo</p>
    <p>terzo</p>
    <!--non sicuro-->
    <!--<p><strong><?=$msg?></strong></p>-->
    <!--è protetto a differenza di quello sopra-->
    <p><strong><?=htmlspecialchars($msg)?></strong></p>
</body>
</html>