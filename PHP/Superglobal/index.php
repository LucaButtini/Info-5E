<?php
/*variabile superglobal.
/ Una superglobal è una variabie definita da php disponibile in tutti gli script
Si usano per la gestione dei dati.
oltre a _POST e _GET c'è _SERVER.

_COOKIE è un file di testo che contiene le informazioni che il server da al client.
Il browser la salva nella memoria locale. Subito dopo con la richiesta successiva,
il cookie è nell'header verso il server.
Questo è usato dato che l'http è stateless (non ha memoria), quindi per memorizzare alcune informazioni usa il client per salvare.
Le informazioni che ci sono in un cookie sono le preferenze dell'utente


    */
//var_dump($_SERVER);

//echo $_SERVER['SERVER_PROTOCOL'];

if(isset($_COOKIE['user']))
    $name= $_COOKIE['user'];
else
    $name='ciao';

if(isset($_COOKIE['bg-color']))
    $bgColor= $_COOKIE['bg-color'];
else
    $bgColor='white';
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
<body style="background-color: <?= $bgColor ?>;">
    <h1>ciao <?=$name?></h1>
        <form action="action_page.php" method="get">
            <label for="fname">First name:</label><br>
            <input type="text" id="fname" name="fname" value="luca"><br>
            <label for="lname">Last name:</label><br>
            <input type="text" id="lname" name="lname" value="buts"><br><br>
            <label for="pass">password:</label><br>
            <input type="password" id="pass" name="pass"><br><br>
            <label for="colors">Select your color</label>
            <br><br>
            <select id = "colors" name="color">
                <option value="yellow">Yellow</option>
                <option value="red">Red</option>
                <option value="blue">Blue</option>
            </select>
            <input type="submit" value="Submit">
        </form>
</body>
</html>
