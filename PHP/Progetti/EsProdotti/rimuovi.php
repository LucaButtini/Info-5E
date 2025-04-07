<?php
$title = 'Rimuovi Prodotto';
require './Template/header.php';
require 'Config/DBConn.php';

$conf = require 'Config/db_conf.php';
$db = DbConn::getConnection($conf);

$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $codice = $_POST['codice'];
    //verifica se esiste prodotto
    $checkQuery = "SELECT * FROM prodotti WHERE codice = :codice";
    $checkStmt = $db->prepare($checkQuery);
    $checkStmt->bindValue(':codice', $codice);
    $checkStmt->execute();
    $prodotto = $checkStmt->fetch();

    if ($prodotto) {
        // Rimuove il prodotto
        $deleteQuery = "DELETE FROM prodotti WHERE codice = :codice";
        $deleteStmt = $db->prepare($deleteQuery);
        $deleteStmt->bindValue(':codice', $codice);
        $deleteStmt->execute();

        header('Location: confirm.html');
        exit();
    } else {
        $error = "<div class='alert alert-danger mt-4'>Prodotto con codice <strong>$codice</strong> non trovato.</div>";
    }
}
?>

<div class="text-center mb-4">
    <h1 class="text-primary"><strong>Rimuovi Prodotto</strong></h1>
</div>

<div class="container" style="max-width: 500px">
    <form method="post" action="rimuovi.php">
        <div class="mb-4">
            <label for="codice" class="form-label">Codice Prodotto:</label>
            <input type="number" class="form-control" id="codice" name="codice" placeholder="Codice" min="0" required>
        </div>

        <button type="submit" class="btn btn-dark w-100">
            <i class="bi bi-trash"></i> Rimuovi Prodotto
        </button>
    </form>

    <?= $error ?>
</div>

<?php require './Template/footer.php'; ?>
