<?php
require_once 'db.php';

$title = 'Elenco Sovrani';
require 'header.php';

// Query per ottenere i dati dalla tabella "sovrani"
$query = 'SELECT * FROM sovrani';

try {
    $stm = $db->prepare($query);
    $stm->execute();

    ob_start();
    while ($sovrano = $stm->fetch(PDO::FETCH_OBJ)) {
        echo "<tr>";
        echo "<td><img src='" . htmlspecialchars($sovrano->immagine) . "' alt='Immagine di " . htmlspecialchars($sovrano->nome) . "' width='50'></td>";
        echo "<td>" . htmlspecialchars($sovrano->nome) . "</td>";
        echo "<td>" . htmlspecialchars($sovrano->inizio_regno) . "</td>";
        echo "<td>" . ($sovrano->fine_regno ? htmlspecialchars($sovrano->fine_regno) : 'In corso') . "</td>";
        echo "<td>" . ($sovrano->predecessore_nome ? htmlspecialchars($sovrano->predecessore_nome) : 'Nessuno') . "</td>";
        echo "<td>" . ($sovrano->successore_nome ? htmlspecialchars($sovrano->successore_nome) : 'Nessuno') . "</td>";
        echo "</tr>";
    }
    $content = ob_get_contents();
    ob_end_clean();

    $stm->closeCursor();
} catch (Exception $e) {
    logError($e);
    $content = '<tr><td colspan="6" class="text-danger">Errore durante il caricamento dei dati.</td></tr>';
}
?>

<div class="container mt-5 rounded-4 p-5 bg-white">
    <div class="text-center pt-3">
        <h1 class="text-primary"><strong>Elenco dei Sovrani</strong></h1>
        <p class="lead">Visualizza l'elenco completo dei sovrani registrati:</p>
    </div>

    <div class="table-responsive mt-4">
        <table class="table table-striped table-bordered text-center">
            <thead class="table-dark">
            <tr>
                <th>Immagine</th>
                <th>Nome</th>
                <th>Inizio Regno</th>
                <th>Fine Regno</th>
                <th>Predecessore</th>
                <th>Successore</th>
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
