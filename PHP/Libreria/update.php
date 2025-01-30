<?php
require_once 'db.php';


$title='Update';
require 'header.php';


// Aggiorna il prezzo del libro se il modulo è stato inviato
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $isbn = $_POST['isbn'];
    $nuovoPrezzo = $_POST['prezzo'];

    // Query di aggiornamento prezzo
    $query = "UPDATE libri SET prezzo = :prezzo WHERE ISBN = :isbn";
    try {
        $stm = $db->prepare($query);
        $stm->bindParam(':isbn', $isbn);
        $stm->bindParam(':prezzo', $nuovoPrezzo);
        $stm->execute();

        // Redirect alla pagina di conferma
        header('Location: confirm_page.html');
        exit();
    } catch (Exception $e) {
        // Gestisci l'errore del database
        error_log($e->getMessage());
    }
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
            <input type="number" name="isbn" id="isbn" class="form-control" placeholder="Inserisci l'ISBN del libro"  min="0" required>
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
