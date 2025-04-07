<?php
$title = 'Aggiungi Prodotti';
require './Template/header.php';
require 'Config/DBConn.php';

$conf = require 'Config/db_conf.php';
$db = DbConn::getConnection($conf);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $codice = $_POST['codice'];
    $descrizione = $_POST['descrizione'];
    $costo = $_POST['costo'];
    $quantita = $_POST['quantita'];
    $data_produzione = $_POST['data_produzione'];


    $checkQuery = "SELECT * FROM prodotti WHERE codice = :codice";
    $checkStmt = $db->prepare($checkQuery);
    $checkStmt->bindValue(':codice', $codice);
    $checkStmt->execute();
    $prodEsistente = $checkStmt->fetch();

    if ($prodEsistente) {
        // Se il cliente è già registrato, mostra un messaggio informativo
        echo "<div class='container mt-5'><h3 class='text-danger'>Prodotto con questi codice già esistente!</h3></div>";
    } else {
        // Inserimento del nuovo cliente
        $query = "INSERT INTO prodotti (codice, descrizione, costo, quantita, data_produzione) 
                  VALUES (:codice, :descrizione, :costo, :quantita, :data_produzione)";
        $stm = $db->prepare($query);
        $stm->bindValue(':codice', $codice);
        $stm->bindValue(':descrizione', $descrizione);
        $stm->bindValue(':costo', $costo);
        $stm->bindValue(':quantita', $quantita);
        $stm->bindValue(':data_produzione', $data_produzione);

        $stm->execute();

        header('Location: confirm.html');
        exit();
    }
}
?>
    <!-- Form di inserimento dati cliente -->
    <div class="text-center">
        <h1 class="text-primary"><strong>Aggiorna Prezzo Prodottop</strong></h1>
    </div>

    <form method="post" action="inserisci.php">
        <div class="mb-4">
            <label for="codice" class="form-label">Codice:</label>
            <input type="text" class="form-control" id="codice" name="codice" placeholder="Codice" required>
        </div>
        <div class="mb-4">
            <label for="descrizione" class="form-label">Descrizione:</label>
            <input type="text" class="form-control" id="descrizione" name="descrizione" placeholder="Descrizione" required>
        </div>
        <div class="mb-4">
            <label for="costo" class="form-label">Costo:</label>
            <input type="number" class="form-control" id="costo" name="costo" placeholder="Costo" min="0" required>
        </div>
        <div class="mb-4">
            <label for="quantita" class="form-label">Quantità:</label>
            <input type="number" class="form-control" id="quantita" name="quantita" placeholder="Quantità" min="1" required>
        </div>
        <div class="mb-4">
            <label for="data" class="form-label">Data Produzione:</label>
            <input type="date" class="form-control" id="data" name="data" placeholder="Data Produzione" required>
        </div>

        <button type="submit" class="btn btn-dark"><i class="bi bi-plus-circle"></i> Aggiungi Cliente</button>
    </form>


<?php
require './Template/footer.php';
?>