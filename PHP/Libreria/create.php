<?php
require_once 'db.php';

$title = 'Create';
require 'header.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Prendo i dati dal form (tutti i campi sono obbligatori grazie a required)
    $titolo = $_POST['titolo'];
    $autore = $_POST['autore'];
    $genere = $_POST['genere'];
    $prezzo = $_POST['prezzo'];
    $anno_pubblicazione = $_POST['anno_pubblicazione'];

    // Query di inserimento
    $query = "INSERT INTO libri (title, autore, genere, prezzo, anno_pubblicazione) VALUES (:titolo, :autore, :genere, :prezzo, :anno_pubblicazione)";
    $stmt = $db->prepare($query);
    $stmt->bindValue(':titolo', $titolo);
    $stmt->bindValue(':autore', $autore);
    $stmt->bindValue(':genere', $genere);
    $stmt->bindValue(':prezzo', $prezzo);
    $stmt->bindValue(':anno_pubblicazione', $anno_pubblicazione);
    $stmt->execute();

    // Redirect alla pagina di conferma
    header('Location: confirm_page.html');
    exit();
}
?>

<div class="container mt-5 rounded-4 p-5 bg-white">
    <div class="text-center pt-3">
        <h1 class="text-danger"><strong>La Libreria Digitale</strong></h1>
        <p class="lead">Inserisci il libro nella libreria:</p>
    </div>
    <!-- Form di inserimento libro -->
    <form action="create.php" method="POST">
        <div class="mb-3">
            <label for="titolo" class="form-label">Titolo:</label>
            <input type="text" class="form-control" id="titolo" name="titolo" required>
        </div>
        <div class="mb-3">
            <label for="autore" class="form-label">Autore:</label>
            <input type="text" class="form-control" id="autore" name="autore" required>
        </div>
        <div class="mb-3">
            <label for="genere" class="form-label">Genere:</label>
            <input type="text" class="form-control" id="genere" name="genere" required>
        </div>
        <div class="mb-3">
            <label for="prezzo" class="form-label">Prezzo (€):</label>
            <input type="number" class="form-control" id="prezzo" name="prezzo" min="0" step="0.01" required>
            <small id="prezzoHelp" class="form-text text-muted">Inserisci il prezzo in formato numerico (es. 10.50).</small>
        </div>
        <div class="mb-3">
            <label for="anno_pubblicazione" class="form-label">Anno di Pubblicazione:</label>
            <input type="date" class="form-control" id="anno_pubblicazione" name="anno_pubblicazione" required>
        </div>
        <button type="submit" class="btn btn-primary"><i class="bi bi-plus-circle"></i> Aggiungi Libro</button>
    </form>

</div>
<?php
require 'footer.php';
?>





