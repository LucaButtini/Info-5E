<?php

$nazioni= require_once 'nazioni.php';


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>nazioni</title>
</head>
<body>
    <h1>Form Inserimento</h1>
    <form method="post" action="action.php">
        <div>
            <label for="nome">Inserisci Nome:</label><br>
            <input type="text" id="nome" name="nome" required placeholder="nome"><br>
            <label for="citta">Inserisci Città:</label><br>
            <input type="text" id="citta" name="citta" required placeholder="città"><br>
            <label for="indirizzo">Inserisci Indirizzo:</label><br>
            <input type="text" id="indirizzo" name="indirizzo" required placeholder="indirizzo"><br>
            <label for="numero">Inserisci Numero Telefono:</label><br>
            <input type="text" id="numero" name="numero" required placeholder="numero"><br>
        </div>
        <br>
        <div>
            <!--aziende che collaborano-->
            <label for="naz">Scegli le nazioni con cui collabora l'azienda:</label><br>
            <?php foreach ($nazioni as $key => $value) {?>
                <input type="checkbox" id="naz" value="<?= $key ?>" name="naz[]"><?= $value?><br>
            <?php } ?>
            <br>
            <!-- numeri sedi-->

            <?php foreach ($nazioni as $key => $value) {?>

            <label for="<?= $key ?>">Inserisci sedi per <?= $value ?></label><br>
                <input type="number" id="<?= $key ?>" name="<?= $key ?>" min="0" placeholder="numero sedi"><br>

            <?php } ?>

        </div>
        <br>
            <input type="submit" value="submit form">
    </form>

</body>
</html>
