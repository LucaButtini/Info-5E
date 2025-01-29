<?php
require_once 'db.php';


$title='Delete';

require 'header.php';

// Funzione per loggare gli errori nel file log/database_log

// Variabile per l'alert JavaScript
$alertMessage = '';

// Verifica se il form è stato inviato
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'] ?? '';
    $autore = $_POST['autore'] ?? '';

    // Validazione dei dati
    if (!empty($title) && !empty($autore)) {
        try {
            // Query per eliminare il libro in base al titolo e all'autore
            $query = 'DELETE FROM libri WHERE title = :title AND autore = :autore';
            $stmt = $db->prepare($query);

            // Associa i parametri alla query
            $stmt->bindValue(':title', $title);
            $stmt->bindValue(':autore', $autore);

            // Esegui la query
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $alertMessage = "Il libro è stato eliminato con successo!";
            } else {
                $alertMessage = "Nessun libro trovato con il titolo e l'autore specificati.";
            }
        } catch (Exception $e) {
            logError($e);
        }
    } else {
        $alertMessage = "Inserisci sia il titolo che l'autore.";
    }
}

// Stampa l'alert in JavaScript se il messaggio è impostato
if (!empty($alertMessage)) {
    echo "<script>alert('$alertMessage');</script>";
}
?>

<div class="container mt-5 rounded-4 p-5 bg-white">
    <div class="text-center pt-3">
        <h1 class="text-danger"><strong>La Libreria Digitale</strong></h1>
        <p class="lead">Rimuovi un libro dalla libreria:</p>
    </div>

    <!-- Form per la cancellazione di un libro -->
    <form method="post" action="delete.php" class="mt-4">
        <div class="mb-3">
            <label for="title" class="form-label">Titolo del libro</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Inserisci il titolo del libro" required>
        </div>
        <div class="mb-3">
            <label for="autore" class="form-label">Autore del libro</label>
            <input type="text" class="form-control" id="autore" name="autore" placeholder="Inserisci l'autore del libro" required>
        </div>
        <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i> Elimina Libro</button>
    </form>
</div>

<?php
require 'footer.php';
?>
