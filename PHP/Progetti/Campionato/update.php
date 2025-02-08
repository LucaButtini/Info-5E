<?php
require 'Dbconnection.php';
$config = require('db_config.php');
$db = Dbconnection::getDb($config);
$title= 'Aggiorna';
require 'header.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $numero_pilota = $_POST['numero_pilota'];
    $punteggio_aggiuntivo = $_POST['punteggio'];

    //  Verifica se il pilota esiste
    $checkQuery = "SELECT * FROM campionato.piloti WHERE numero = :numero_pilota";
    $checkStmt = $db->prepare($checkQuery);
    $checkStmt->bindValue(':numero_pilota', $numero_pilota);
    $checkStmt->execute();

    if ($checkStmt->rowCount() > 0) {
        // se trova il pilota aggiorna il punteggio
        $query = "UPDATE campionato.piloti 
                  SET punteggio = :punteggio
                  WHERE numero = :numero_pilota";

        $stm = $db->prepare($query);
        $stm->bindValue(':punteggio', $punteggio_aggiuntivo);
        $stm->bindValue(':numero_pilota', $numero_pilota);

        if ($stm->execute()) {
            $success = "Punteggio aggiornato con successo!";
        } else {
            $error = "Errore durante l'aggiornamento del punteggio.";
        }

        header('Location: confirm.html');
        exit();
    } else {
        // Pilota non trovato
        $error = "Pilota non trovato. Verifica il numero inserito.";
    }
}
?>

<div class="container bg-dark mt-5 p-5 text-light rounded-4">
    <div class="text-center">
        <h1 class="text-primary"><strong>CAMPIONATO AUTOMOBILISTICO</strong></h1>
        <p class="lead">Aggiorna la classifica generale del campionato.</p>
    </div>

    <?php if (isset($error)) : ?>
        <div class="alert alert-danger"><?php echo $error; ?></div>
    <?php endif; ?>

    <form method="post" action="update.php">
        <div class="mb-4">
            <label for="numero_pilota" class="form-label">Numero Pilota:</label>
            <input type="number" class="form-control" id="numero_pilota" name="numero_pilota" placeholder="Numero Pilota" required>
        </div>
        <div class="mb-4">
            <label for="punteggio" class="form-label">Punteggio da aggiornare:</label>
            <input type="number" class="form-control" id="punteggio" name="punteggio" placeholder="Punteggio" required>
        </div>
        <button type="submit" class="btn btn-primary"><i class="bi bi-arrow-up-circle"></i> Aggiorna Classifica</button>
    </form>
</div>

<?php
require 'footer.php';
?>
