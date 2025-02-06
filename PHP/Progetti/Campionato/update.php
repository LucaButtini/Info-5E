<?php
require 'Dbconnection.php';
$config = require('db_config.php');
$db = Dbconnection::getDb($config);

require 'header.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $numero_pilota = $_POST['numero_pilota'];
    $punteggio_aggiuntivo = $_POST['punteggio'];

    //aggiorno punteggio pilota
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
}
?>

<div class="container bg-dark mt-5 p-5 text-light rounded-4">
    <div class="text-center">
        <h1 class="text-primary"><strong>CAMPIONATO AUTOMOBILISTICO</strong></h1>
        <p class="lead">Aggiorna la classifica generale del campionato.</p>
    </div>


    <form method="post" action="update.php">
        <div class="mb-4">
            <label for="numero_pilota" class="form-label">Numero Pilota:</label>
            <input type="number" class="form-control" id="numero_pilota" name="numero_pilota" placeholder="Numero Pilota" required>
        </div>
        <div class="mb-4">
            <label for="punteggio" class="form-label">Punteggio da Aggiungere:</label>
            <input type="number" class="form-control" id="punteggio" name="punteggio" placeholder="Punteggio" required>
        </div>
        <button type="submit" class="btn btn-primary"><i class="bi bi-arrow-up-circle"></i> Aggiorna Classifica</button>
    </form>
</div>

<?php
require 'footer.php';
?>
