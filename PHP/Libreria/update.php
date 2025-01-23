<?php
require_once 'db.php'; // Inclusione del file per la connessione al database

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
    <title>Update</title>
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
                    <a class="nav-link" href="create.php">Aggiungi libro</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="read.php">Visualizza libreria</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="#">Aggiorna prezzo libro</a>
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
        <p class="lead">Aggiorna il prezzo di un libro:</p>
    </div>

    <form action="update.php" method="POST" class="mt-4">
        <div class="mb-3">
            <label for="isbn" class="form-label">ISBN del libro:</label>
            <input type="number" name="isbn" id="isbn" class="form-control" placeholder="Inserisci l'ISBN del libro" required>
        </div>
        <div class="mb-3">
            <label for="prezzo" class="form-label">Nuovo prezzo (€):</label>
            <input type="number" step="0.01" name="prezzo" id="prezzo" class="form-control" placeholder="Inserisci il nuovo prezzo" required>
            <small id="prezzoHelp" class="form-text text-muted">Inserisci un prezzo positivo (es. 10.50).</small>
        </div>
        <button type="submit" class="btn btn-warning"><i class="bi bi-pencil"></i> Aggiorna Prezzo</button>
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
