<?php
$page = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/x-icon" href="Immagini/car-front-fill.ico">
    <title><?=/**@var $title*/ $title?></title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><strong>Utopia</strong></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link <?= $page == 'index.php' ? 'active':''; ?>" href="index.php">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link <?= $page == 'inserisci.php' ? 'active':''; ?>" href="inserisci.php">Inserimento</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $page == 'visualizza.php' ? 'active':''; ?>" href="visualizza.php">Visualizza</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
