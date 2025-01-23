<?php
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
    <link rel="icon" href="Immagini/home.ico" type="image/x-icon">
    <title>Home</title>
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
                    <a class="nav-link active" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="create.php">Aggiungi libro</a>
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
        <p class="lead">Benvenuto nella gestione della libreria digitale.</p>
    </div>

    <div class="text-center my-4">
        <img src="Immagini/libreria2.jpg" alt="Libreria digitale" class="rounded-3 shadow-sm" id="img-home">
    </div>

    <div class="container my-5">
        <h3 class="text-center mb-4">Seleziona un opzione per eseguire un operazione CRUD:</h3>
        <div class="row text-center">
            <div class="col-12 mb-4">
                <div class="card shadow-sm bg-body-tertiary">
                    <div class="card-body">
                        <h5 class="card-title">Aggiungi Libro</h5>
                        <p class="card-text">Inserisci un nuovo libro nella libreria.</p>
                        <a href="create.php" class="btn btn-primary"><i class="bi bi-plus-circle"></i> Aggiungi</a>
                    </div>
                </div>
            </div>
            <div class="col-12 mb-4">
                <div class="card shadow-sm bg-body-tertiary">
                    <div class="card-body">
                        <h5 class="card-title">Visualizza Libri</h5>
                        <p class="card-text">Consulta l'elenco completo dei libri.</p>
                        <a href="read.php" class="btn btn-success"><i class="bi bi-table"></i> Visualizza</a>
                    </div>
                </div>
            </div>
            <div class="col-12 mb-4">
                <div class="card shadow-sm bg-body-tertiary">
                    <div class="card-body">
                        <h5 class="card-title">Aggiorna Prezzo</h5>
                        <p class="card-text">Modifica il prezzo di un libro esistente.</p>
                        <a href="update.php" class="btn btn-warning"><i class="bi bi-pencil"></i> Aggiorna</a>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card shadow-sm bg-body-tertiary">
                    <div class="card-body">
                        <h5 class="card-title">Elimina Libro</h5>
                        <p class="card-text">Rimuovi un libro dalla tua libreria.</p>
                        <a href="delete.php" class="btn btn-danger"><i class="bi bi-trash"></i> Elimina</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<footer>
    <div class="bg-dark py-5 mt-5 text-center rounded-3"> <!-- Aggiunto rounded-3 -->
        <p class="display-6 mb-3 text-white">Buttini Luca 5-E</p>
        <small class="text-white-50">&copy; 2025 Libreria Digitale. All rights reserved.</small>
    </div>
</footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
