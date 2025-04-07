<?php
$title = 'Aggiorna Prezzo Prodotto';
require './Template/header.php';
require 'Config/DBConn.php';

$conf = require 'Config/db_conf.php';
$db = DbConn::getConnection($conf);

$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $codice = $_POST['codice'];
    $costo = $_POST['costo'];

    // controllo se prodotto esiste
    $checkQuery = "SELECT * FROM prodotti WHERE codice = :codice";
    $checkStmt = $db->prepare($checkQuery);
    $checkStmt->bindValue(':codice', $codice);
    $checkStmt->execute();
    $prodotto = $checkStmt->fetch();


    if ($prodotto) {
        $updateQuery = "UPDATE prodotti SET costo = :costo WHERE codice = :codice";
        $updateStmt = $db->prepare($updateQuery);
        $updateStmt->bindValue(':costo', $costo);
        $updateStmt->bindValue(':codice', $codice);
        $updateStmt->execute();

        header('Location: confirm.html');
        exit();
    } else {
        $error = "<div class='alert alert-danger mt-4'>Prodotto con codice <strong>$codice</strong> non trovato.</div>";
    }
}
?>

<div class="text-center mb-4">
    <h1 class="text-primary"><strong>Aggiorna Prezzo Prodotto</strong></h1>
</div>

<div class="container" style="max-width: 500px">
    <form method="post" action="aggiorna.php">
        <div class="mb-4">
            <label for="codice" class="form-label">Codice:</label>
            <input type="text" class="form-control" id="codice" name="codice" placeholder="Codice" required>
        </div>
        <div class="mb-4">
            <label for="costo" class="form-label">Nuovo Costo (€):</label>
            <input type="number" class="form-control" id="costo" name="costo" min="0" step="0.01"  placeholder="Costo" required>
        </div>

        <button type="submit" class="btn btn-dark w-100">
            <i class="bi bi-pencil-square"></i> Aggiorna Prezzo
        </button>
    </form>

    <?= $error ?>
</div>

<?php require './Template/footer.php'; ?>
