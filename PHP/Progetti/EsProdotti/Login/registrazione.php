<?php
session_start();
require '../Config/DBConn.php';

$conf = require '../Config/db_conf.php';
$db = DbConn::getConnection($conf);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    // Hash della password
    $password_hashed = password_hash($_POST['password'], PASSWORD_DEFAULT);


    $checkQuery = "SELECT * FROM utenti WHERE username = :username";
    $checkStmt = $db->prepare($checkQuery);
    $checkStmt->bindValue(':username', $username);
    $checkStmt->execute();

    if ($checkStmt->fetch()) {
        $error = "Errore: Username già in uso già in uso!";
    } else {
        try {
            $query = "INSERT INTO utenti (username, email, password) VALUES (:username, :email, :password)";
            $stmt = $db->prepare($query);

            $stmt->bindValue(':username', $username);
            $stmt->bindValue(':email', $email);
            $stmt->bindValue(':password', $password_hashed);
            $stmt->execute();


            // messaggio conferma registrazione
            $success = "Registrazione completata con successo! <a href='loginUtente.php'>Clicca qui per accedere</a>.";
        } catch (Exception $e) {
            $error = "Errore registrazione";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrazione</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex justify-content-center align-items-center vh-100">

<div class="card p-4 shadow" style="width: 350px;">
    <h2 class="text-center text-primary mb-4">Registrazione Utente</h2>

    <?php if (isset($error)) { ?>
        <div class="alert alert-danger"><?= $error; ?></div>
    <?php } ?>

    <?php if (isset($success)) { ?>
        <div class="alert alert-success"><?= $success; ?></div>
    <?php } ?>

    <form method="POST" action="registrazione.php">
        <div class="mb-3">
            <label class="form-label" for="username">Username:</label>
            <input type="text" name="username" id="username" class="form-control" placeholder="Inserisci il tuo username" required>
        </div>

        <div class="mb-3">
            <label class="form-label" for="email">Email:</label>
            <input type="email" name="email" id="email" class="form-control" placeholder="Inserisci la tua email" required>
        </div>

        <div class="mb-3">
            <label class="form-label" for="password">Password:</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Inserisci la tua password" required>
        </div>


        <button type="submit" class="btn btn-primary w-100">Registrati</button>
    </form>

    <p class="text-center mt-3">
        Hai già un account? <a href="loginUtente.php">Accedi</a>
    </p>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
