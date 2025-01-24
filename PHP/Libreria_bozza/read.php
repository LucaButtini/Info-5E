<?php
require_once 'db.php';


function logError(Exception $e){
    if (!is_dir('log')) {
        mkdir('log', 0777, true); // Creare la cartella log se non esiste
    }
    error_log(
        $e->getMessage() . ' --- ' . date('Y-m-d H:i:s') . "\n",
        3,
        'log/database_log'
    );
    echo '<div class="alert alert-danger" role="alert">Si è verificato un problema con il database. Per favore riprova più tardi.</div>';
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
    <title>Read</title>
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
                    <a class="nav-link active" href="#">Visualizza libreria</a>
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
        <p class="lead">Visualizza la tua libreria (aggiornare la pagina per visualizzare eventuali modifiche):</p>
    </div>

    <div class="table-responsive mt-4">
        <table class="table table-striped table-bordered text-center">
            <thead class="table-dark">
            <tr>
                <th>ISBN</th>
                <th>Titolo</th>
                <th>Autore</th>
                <th>Genere</th>
                <th>Prezzo (€)</th>
                <th>Anno di Pubblicazione</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $query = "SELECT * FROM libri;"; // Query per ottenere tutti i libri
            try {
                $stm = $db->prepare($query);
                $stm->execute();

                while ($libro = $stm->fetch()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($libro->ISBN) . "</td>";
                    echo "<td>" . htmlspecialchars($libro->title) . "</td>";
                    echo "<td>" . htmlspecialchars($libro->autore) . "</td>";
                    echo "<td>" . htmlspecialchars($libro->genere) . "</td>";
                    echo "<td>€" . number_format($libro->prezzo, 2, ',', '.') . "</td>";
                    echo "<td>" . htmlspecialchars($libro->anno_pubblicazione) . "</td>";
                    echo "</tr>";
                }

                $stm->closeCursor();
            } catch (Exception $e) {
                logError($e);
            }
            ?>
            </tbody>
        </table>
    </div>
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
