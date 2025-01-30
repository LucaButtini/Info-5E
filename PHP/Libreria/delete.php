<?php
require_once 'db.php';

$title = 'Delete';
require 'header.php';

// Verifica se il form è stato inviato
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'] ?? '';
    $autore = $_POST['autore'] ?? '';

    // Se titolo e autore non sono vuoti, procedi con l'eliminazione
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
        } catch (Exception $e) {
            // Log degli errori
            error_log($e->getMessage());
        }
    }
    // Reindirizza alla pagina di conferma dopo l'eliminazione
    header('Location: confirm_page.html');
    exit();
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
            <label for="title" class="form-label">Titolo del libro:</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Inserisci il titolo del libro" required>
        </div>
        <div class="mb-3">
            <label for="autore" class="form-label">Autore del libro:</label>
            <input type="text" class="form-control" id="autore" name="autore" placeholder="Inserisci l'autore del libro" required>
        </div>
        <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i> Elimina Libro</button>
    </form>
</div>

<?php
require 'footer.php';
?>
