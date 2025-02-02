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
    <title>Campionato</title>
</head>
<body class="bg-black">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><strong>Campionato 5-E</strong></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" href="#">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Inserimento
                    </a>
                    <ul class="dropdown-menu" data-bs-theme="dark">
                        <li><a class="dropdown-item text-white bg-dark" href="insert_casa.php">Casa</a></li>
                        <li><a class="dropdown-item text-white bg-dark" href="#">Pilota</a></li>
                        <li><a class="dropdown-item text-white bg-dark" href="#">Gara</a></li>
                        <li><a class="dropdown-item text-white bg-dark" href="#">Partecipazioni</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Visualizza dati</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Ordine Arrivo</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Aggiorna classifica</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Classifica piloti</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Classifica case</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
