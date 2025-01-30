<?php
$page = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);

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
    <title><?=/**@var $title*/ $title?></title>
    <link rel="icon" type="image/x-icon" href="Immagini/book.ico">
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
                    <a class="nav-link <?= $page == 'index.php' ? 'active':''; ?>" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $page == 'create.php' ? 'active':''; ?>" href="create.php">Aggiungi libro</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $page == 'read.php' ? 'active':''; ?>" href="read.php">Visualizza libreria</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $page == 'update.php' ? 'active':''; ?>" href="update.php">Aggiorna prezzo libro</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $page == 'delete.php' ? 'active':''; ?>" href="delete.php">Elimina libro</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
