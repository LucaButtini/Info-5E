<?php

$title = 'Elenco Prodotti';
require './Template/header.php';
require 'Config/DBConn.php';

$conf = require 'Config/db_conf.php';
$db = DbConn::getConnection($conf);

// Query per ottenere i dati dalla tabella "prodotti"
$query = 'SELECT * FROM prodotti';

$content = '';

try {
    $stm = $db->prepare($query);
    $stm->execute();

    while ($prodotto = $stm->fetch()) {
        $content .= "<tr>";
        $content .= "<td>" . $prodotto->codice . "</td>";
        $content .= "<td>" . $prodotto->descrizione . "</td>";
        $content .= "<td>€ " . number_format($prodotto->costo, 2, ',', '.') . "</td>";
        $content .= "<td>" . $prodotto->quantita . "</td>";
        $content .= "<td>" . date("d/m/Y", strtotime($prodotto->data_produzione)) . "</td>";
        $content .= "</tr>";
    }

    $stm->closeCursor();
} catch (Exception $e) {

    $content = '<tr><td colspan="5" class="text-danger">Errore durante il caricamento dei dati.</td></tr>';
}
?>

<div class="text-center pt-3">
    <h1 class="text-primary"><strong>Elenco Prodotti</strong></h1>
    <p class="lead">Visualizza l'elenco completo dei prodotti disponibili:</p>
</div>

<div class="table-responsive mt-4">
    <table class="table table-striped table-bordered text-center table-hover">
        <thead class="table-dark">
        <tr>
            <th>Codice</th>
            <th>Descrizione</th>
            <th>Costo</th>
            <th>Quantità</th>
            <th>Data di Produzione</th>
        </tr>
        </thead>
        <tbody>
        <?= $content; ?>
        </tbody>
    </table>
</div>

<?php
require './Template/footer.php';
?>
