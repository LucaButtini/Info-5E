<?php
ob_start();
session_start();

$page = basename($_SERVER["SCRIPT_NAME"]);
?>
<!doctype html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <title><?= /*  @var $title*/$title?></title>
</head>
<body class="d-flex flex-column min-vh-100">

<nav class="navbar navbar-expand-lg bg-primary navbar-dark sticky-top py-3">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><strong>Prodotti Elettronica</strong></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link <?= $page == 'index.php' ? 'active' : '' ?>" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $page == 'insert_clienti.php' ? 'active' : '' ?>" href="insert_clienti.php">Inserimento Cliente</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $page == 'insert_destinatari.php' ? 'active' : '' ?>" href="insert_destinatari.php">Inserimento Destinatari</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $page == 'insert_plichi.php' ? 'active' : '' ?>" href="insert_plichi.php">Inserimento Plico</a>
                </li>
            </ul>

            <?php if (isset($_SESSION['user_nome'])){ ?>
                <div class="dropdown">
                    <button class="btn btn-light dropdown-toggle" type="button" id="userMenu" data-bs-toggle="dropdown">
                        <i class="bi bi-person-circle"></i> <?= $_SESSION['user_nome'] ?>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="Login/impostazioni.php"><i class="bi bi-gear-fill"></i> Impostazioni</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item text-danger" href="Login/logout.php"><i class="bi bi-box-arrow-right"></i> Logout</a></li>
                    </ul>
                </div>
            <?php } else { ?>
                <a class="nav-link text-light" href="Login/login.php"><i class="bi bi-box-arrow-in-right"></i> Login</a>
            <?php } ?>
        </div>
    </div>
</nav>

<div class="container mt-5 text-center rounded-4 flex-grow-1">



