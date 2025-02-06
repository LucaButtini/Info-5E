<?php
require 'Dbconnection.php';
$config = require('db_config.php');
$db = Dbconnection::getDb($config);

require 'header.php';

// Query per ottenere i dati della classifica piloti ordinati per punteggio
$query = "SELECT p.numero, p.nome, p.cognome, p.nazionalita, p.punteggio, p.nome_casa, g.luogo, g.data
          FROM campionato.piloti p
          JOIN campionato.partecipare pa ON p.numero = pa.numero_pilota
          JOIN campionato.gare g ON pa.id_gara = g.id_gara
          ORDER BY p.punteggio DESC, g.data DESC;";


try {
    $stm = $db->prepare($query);
    $stm->execute();

    ob_start();
    while ($pilota = $stm->fetch(PDO::FETCH_OBJ)) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($pilota->numero) . "</td>";
        echo "<td>" . htmlspecialchars($pilota->nome) . " " . htmlspecialchars($pilota->cognome) . "</td>";
        echo "<td>" . htmlspecialchars($pilota->nazionalita) . "</td>";
        echo "<td>" . htmlspecialchars($pilota->nome_casa) . "</td>";
        echo "<td><strong>" . number_format($pilota->punteggio, 0, ',', '.') . "</strong></td>";
        echo "<td>" . htmlspecialchars($pilota->luogo) . " (" . htmlspecialchars($pilota->data) . ")</td>";
        echo "</tr>";
    }

    $content = ob_get_contents();
    ob_end_clean();

    $stm->closeCursor();
} catch (PDOException $exception) {
    logError($exception);
    $content = '<tr><td colspan="5" class="text-danger">Errore durante il caricamento della classifica.</td></tr>';
}
?>

<div class="container bg-dark mt-5 p-5 text-light rounded-4">
    <div class="text-center">
        <h1 class="text-primary"><strong>CAMPIONATO AUTOMOBILISTICO</strong></h1>
    </div>

    <h3 class="text-center mb-4">Classifica Piloti</h3>
    <div class="table-responsive mt-4">
        <table class="table table-dark table-striped table-hover table-bordered text-center">
            <thead style="background-color: #212529; border-bottom: 3px solid #0d6efd;">
            <tr class="text-primary fw-bold">
                <th>NUMERO</th>
                <th>PILOTA</th>
                <th>NAZIONALITÁ</th>
                <th>NOME CASA</th>
                <th>PUNTEGGIO</th>
                <th>GARA (LUOGO E DATA)</th>
            </tr>
            </thead>
            <tbody>
            <?= $content; ?>
            </tbody>
        </table>
    </div>
</div>


<?php
require 'footer.php';
?>
