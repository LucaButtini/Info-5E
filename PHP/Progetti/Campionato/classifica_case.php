<?php
require 'Dbconnection.php';
$config = require('db_config.php');
$db = Dbconnection::getDb($config);

require 'header.php';

// Query per ottenere la classifica delle case automobilistiche
$query = "SELECT ca.nome_casa, SUM(p.punteggio) AS punteggio_totale
          FROM campionato.case_automobilistiche ca
          JOIN campionato.piloti p ON p.nome_casa = ca.nome_casa
          JOIN campionato.partecipare pa ON pa.numero_pilota = p.numero
          JOIN campionato.gare g ON pa.id_gara = g.id_gara
          GROUP BY ca.nome_casa
          ORDER BY punteggio_totale DESC;";

try {
    $stm = $db->prepare($query);
    $stm->execute();

    ob_start();
    while ($casa = $stm->fetch(PDO::FETCH_OBJ)) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($casa->nome_casa) . "</td>";
        echo "<td><strong>" . number_format($casa->punteggio_totale, 0, ',', '.') . "</strong></td>";
        echo "</tr>";
    }

    $content = ob_get_contents();
    ob_end_clean();

    $stm->closeCursor();
} catch (PDOException $exception) {
    logError($exception);
    $content = '<tr><td colspan="2" class="text-danger">Errore durante il caricamento della classifica delle case.</td></tr>';
}
?>

<div class="container bg-dark mt-5 p-5 text-light rounded-4">
    <div class="text-center">
        <h1 class="text-primary"><strong>CAMPIONATO AUTOMOBILISTICO</strong></h1>
    </div>

    <h3 class="text-center mb-4">Classifica Case Automobilistiche</h3>
    <div class="table-responsive mt-4">
        <table class="table table-dark table-striped table-hover table-bordered text-center">
            <thead style="background-color: #212529; border-bottom: 3px solid #0d6efd;">
            <tr class="text-primary fw-bold">
                <th>Nome Casa</th>
                <th>Punteggio Totale</th>
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
