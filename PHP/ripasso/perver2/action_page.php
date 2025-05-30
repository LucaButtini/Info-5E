<?php
$nazioni = require_once 'azienda.php'; // Carica le nazioni

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'] ?? null;
    $citta = $_POST['citta'] ?? null;
    $indirizzo = $_POST['indirizzo'] ?? null;
    $num_tel = $_POST['numero'] ?? null;
    $naz = $_POST['naz'] ?? []; // Le nazioni selezionate

    // Gestiamo i numeri delle aziende per ciascuna nazione
    $numeriNaz = [];
    foreach ($nazioni as $key => $nazione) {
        $numeriNaz[$key] = $_POST[$key] ?? null;
    }

} else {
    echo 'errore';
    exit;
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Riepilogo</title>
</head>
<body>
<h2>Azienda</h2>
<h4>Nome</h4>
<p><?= $nome ?></p>
<h4>Città</h4>
<p><?= $citta ?></p>
<h4>Indirizzo</h4>
<p><?= $indirizzo ?></p>
<h4>Numero tel</h4>
<p><?= $num_tel ?></p>
<h4>Nazioni estere</h4>
<?php foreach ($naz as $nazione) { ?>
    <p><?= $nazioni[$nazione] ?></p>
<?php } ?>

<h2>Numero sedi</h2>
<?php
foreach ($numeriNaz as $nazione => $numero) {
    if ($numero > 0) { ?>
        <p><?= $nazioni[$nazione]?> -> <?=$numero?> sedi</p>
    <?php }
}
?>
</body>
</html>
