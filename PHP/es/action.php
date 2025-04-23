<?php
session_start();
//  dati dalla sessione
$username = $_SESSION['username'];
$ruolo    = $_SESSION['ruolo'];
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5 text-center">
    <h1 class="mb-4">Benvenuto, <?= $username ?></h1>
    <p>Sei connesso come <strong><?= $ruolo ?></strong></p>
</div>
</body>
</html>
