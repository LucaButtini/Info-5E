<?php
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Domande</title>
</head>
<body>
    <h1 class="title">FORM DOMANDE</h1>
    <p id="id-intro">Rispondi alle seguenti domande:</p>
    <br>
    <form method="post" action="display.php">
        <label for="d1">Cos'è un DBMS?</label>
        <br>
        <textarea id="d1" row="5" cols="40" name="d1"></textarea>
        <br>

        <br>
        <input type="submit" value="Submit">
        <br>

    </form>

</body>
</html>
