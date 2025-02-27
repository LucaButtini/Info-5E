<?php

/*$nazioni= require_once 'azienda.php';

$num= count($nazioni);*/

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
<h1>Inserimento dati azienda</h1>

<form method="post" action="action_page.php">
    <label for="nome">Nome Azienda</label><br>
    <input type="text" id="nome" name="nome" placeholder="Nome" required><br><br>
    <label for="citta">Città</label><br>
    <input type="text" id="citta" name="citta" placeholder="Città" required><br><br>
    <label for="indirizzo">Indirizzo</label><br>
    <input type="text" id="indirizzo" name="indirizzo" placeholder="Via Nome/Numero" required><br><br>
    <label for="numero">Numero telefono</label><br>
    <input type="text" id="numero" name="numero" placeholder="+39 00000000" required><br><br>

    <!-- checkbox-->
    <label for="naz">Scegli le nazioni estere con cui l'azienda collabora (max 4):</label><br>
    <input type="checkbox" id="naz" name="naz[]" value="francia">Francia<br>
    <input type="checkbox" id="naz" name="naz[]" value="spagna">Spagna<br>
    <input type="checkbox" id="naz" name="naz[]" value="germania">Germania<br>
    <input type="checkbox" id="naz" name="naz[]" value="inghilterra">Inghilterra<br>
    <input type="checkbox" id="naz" name="naz[]" value="usa">Stati Uniti<br><br>


    <label for="francia">Numero aziende in Francia</label><br>
    <input type="number" id="francia" name="francia" min="0" value="0" required><br>
    <label for="spagna">Numero aziende in Spagna</label><br>
    <input type="number" id="spagna" name="spagna" min="0" value="0" required><br>
    <label for="germania">Numero aziende in Germania</label><br>
    <input type="number" id="germania" name="germania" min="0" value="0" required><br>
    <label for="inghilterra">Numero aziende in Inghilterra</label><br>
    <input type="number" id="inghilterra" name="inghilterra" min="0" value="0" required><br>
    <label for="usa">Numero aziende in Stati Uniti</label><br>
    <input type="number" id="usa" name="usa" min="0" value="0" required><br><br>

    <input type="submit" value="invia i dati">
</form>

</body>
</html>
