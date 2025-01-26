<?php
require_once 'db.php'; // Inclusione del file per la connessione al database
require 'header.php';

// Funzione per loggare gli errori nel file log/database_log
function logError(Exception $e){
    if (!is_dir('log')) {
        mkdir('log', 0777, true); // Creare la cartella log se non esiste
    }
    error_log(
        $e->getMessage() . ' --- ' . date('Y-m-d H:i:s') . "\n",
        3,
        'log/database_log'
    );
    echo '<script>alert("Si è verificato un problema con il database. Per favore riprova più tardi.");</script>';
}

// Variabile per l'alert JavaScript
$alertMessage = '';

// Aggiorna il prezzo del libro se il modulo è stato inviato
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $isbn = $_POST['isbn'];
    $nuovoPrezzo = $_POST['prezzo'];

    // Controllo sul prezzo (deve essere positivo)
    if ($nuovoPrezzo < 0) {
        $alertMessage = "Il prezzo non può essere negativo!";
    }
    // Controllo su eventuali campi vuoti
    elseif (!empty($isbn) && !empty($nuovoPrezzo) && is_numeric($nuovoPrezzo)) {
        $query = "UPDATE libri SET prezzo = :prezzo WHERE ISBN = :isbn";
        try {
            $stm = $db->prepare($query);
            $stm->bindParam(':isbn', $isbn, PDO::PARAM_INT);
            $stm->bindParam(':prezzo', $nuovoPrezzo, PDO::PARAM_STR);
            $stm->execute();

            $alertMessage = "Prezzo del libro aggiornato con successo!";
        } catch (Exception $e) {
            logError($e);
        }
    } else {
        $alertMessage = "Inserisci un ISBN valido e un prezzo numerico valido.";
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
        <p class="lead">Aggiorna il prezzo di un libro:</p>
    </div>

    <form action="update.php" method="POST" class="mt-4">
        <div class="mb-3">
            <label for="isbn" class="form-label">ISBN del libro:</label>
            <input type="number" name="isbn" id="isbn" class="form-control" placeholder="Inserisci l'ISBN del libro" required>
        </div>
        <div class="mb-3">
            <label for="prezzo" class="form-label">Nuovo prezzo (€):</label>
            <input type="number" class="form-control" id="prezzo" name="prezzo" min="0" step="0.01" required>
            <small id="prezzoHelp" class="form-text text-muted">Inserisci il prezzo in formato numerico (es. 10.50).</small>
        </div>
        <button type="submit" class="btn btn-warning"><i class="bi bi-pencil"></i> Aggiorna Prezzo</button>
    </form>
</div>

<?php
require 'footer.php';
?>
