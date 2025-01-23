<?php
require_once 'db.php';  // Includi il file che contiene la connessione

// Variabili per i messaggi di errore o successo
$message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ricezione dei dati dal form
    $titolo = $_POST['titolo'];
    $autore = $_POST['autore'];
    $genere = $_POST['genere'];
    $prezzo = $_POST['prezzo'];
    $anno_pubblicazione = $_POST['anno_pubblicazione'];

    // Controllo sul prezzo (deve essere positivo)
    if ($prezzo < 0) {
        $message = "Il prezzo non può essere negativo!";
    }
    // Controllo sulla data di pubblicazione (deve essere una data valida)
    elseif (!$anno_pubblicazione || strtotime($anno_pubblicazione) === false) {
        $message = "La data di pubblicazione non è valida.";
    }
    // Controllo su eventuali campi vuoti
    elseif (!empty($titolo) && !empty($autore) && !empty($genere) && !empty($prezzo) && !empty($anno_pubblicazione)) {
        // Query per inserire il libro nel database
        $query = "INSERT INTO libri (title, autore, genere, prezzo, anno_pubblicazione) 
                  VALUES (?, ?, ?, ?, ?)";
        $stmt = $db->prepare($query);  // Usa la connessione $db definita in db.php
        $stmt->bindParam(1, $titolo);
        $stmt->bindParam(2, $autore);
        $stmt->bindParam(3, $genere);
        $stmt->bindParam(4, $prezzo);
        $stmt->bindParam(5, $anno_pubblicazione);

        if ($stmt->execute()) {
            $message = "Libro aggiunto con successo!";
        } else {
            $message = "Errore nell'inserimento del libro.";
        }
    } else {
        $message = "Tutti i campi devono essere compilati!";
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="icon" href="" type="image/x-icon">
    <title>Create</title>
</head>
<body class="bg-body-tertiary">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><strong>Gestione Libreria</strong></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="#">Aggiungi libro</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="read.php">Visualizza libreria</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="update.php">Aggiorna prezzo libro</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="delete.php">Elimina libro</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-5 rounded-4 p-5 bg-white">
    <div class="text-center pt-3">
        <h1 class="text-danger"><strong>La Libreria Digitale</strong></h1>
        <p class="lead">Inserisci il libro nella libreria:</p>
    </div>

    <!-- Messaggio di errore o successo come alert JavaScript -->
    <?php if ($message != '') : ?>
        <script>
            alert("<?php echo $message; ?>");
        </script>
    <?php endif; ?>

    <!-- Form di inserimento libro -->
    <form action="create.php" method="POST">
        <div class="mb-3">
            <label for="titolo" class="form-label">Titolo</label>
            <input type="text" class="form-control" id="titolo" name="titolo" required>
        </div>
        <div class="mb-3">
            <label for="autore" class="form-label">Autore</label>
            <input type="text" class="form-control" id="autore" name="autore" required>
        </div>
        <div class="mb-3">
            <label for="genere" class="form-label">Genere</label>
            <input type="text" class="form-control" id="genere" name="genere" required>
        </div>
        <div class="mb-3">
            <label for="prezzo" class="form-label">Prezzo</label>
            <input type="number" class="form-control" id="prezzo" name="prezzo" min="0" step="0.01" required>
            <small id="prezzoHelp" class="form-text text-muted">Inserisci il prezzo in formato numerico (es. 10.50).</small>
        </div>
        <div class="mb-3">
            <label for="anno_pubblicazione" class="form-label">Anno di Pubblicazione</label>
            <input type="date" class="form-control" id="anno_pubblicazione" name="anno_pubblicazione" required>
        </div>
        <button type="submit" class="btn btn-primary">Aggiungi Libro</button>
    </form>

</div>

<footer>
    <div class="bg-dark py-5 mt-5 text-center rounded-3">
        <p class="display-6 mb-3 text-white">Buttini Luca 5-E</p>
        <small class="text-white-50">&copy; 2025 Libreria Digitale. All rights reserved.</small>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
