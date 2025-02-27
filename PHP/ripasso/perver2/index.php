<?php
$nazioni = require_once 'azienda.php'; // Carica le nazioni

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

    <!-- checkbox per le nazioni -->
    <label for="naz">Scegli le nazioni estere con cui l'azienda collabora (max 4):</label><br>
    <?php foreach ($nazioni as $key => $nazione) { ?>
        <input type="checkbox" id="naz" name="naz[]" value="<?= $key ?>"> <?= $nazione ?><br>
    <?php } ?>
    <br>

    <!-- Numeri aziende -->
    <?php foreach ($nazioni as $key => $nazione) { ?>
        <label for="<?= $key ?>"><?= "Numero aziende in $nazione" ?></label><br>
        <input type="number" id="<?= $key ?>" name="<?= $key ?>" min="0" value="0" required><br>
    <?php } ?>

    <input type="submit" value="invia i dati">
</form>

</body>
</html>
