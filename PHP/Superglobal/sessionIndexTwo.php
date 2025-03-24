<?php
/*var_dump(session_get_cookie_params());
die();*/
if(session_status()==PHP_SESSION_NONE)
    session_start();
$materia= $_SESSION['materia'];
$scuola= $_SESSION['scuola'];

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
    <h3>La scuola è <?= $scuola?> e la materia è <?= $materia?></h3>
    <br>
    <!--Nome è session id-->
    <p><?= session_name()?></p>
    <!--value -->
    <p><?= $_COOKIE[session_name()]?></p>

    <a href="logout.php">logout</a>
</body>
</html>
