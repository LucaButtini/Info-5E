<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['ruolo'] !== 'personale') {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Personale</title>
</head>
<body>
<h1>Benvenuto, <?= $_SESSION['username'] ?>!</h1>
<h2>Sei Personale</h2>
<p>Qui puoi accedere alle funzioni amministrative.</p>
<p><a href="logout.php">Esci</a></p>
</body>
</html>
