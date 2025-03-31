<?php
session_start();
require '../Config/DBConn.php';

$conf = require '../Config/db_conf.php';
$db = DbConn::getConnection($conf);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $ruolo = intval($_POST['ruolo']); // 0 = utente normale, 1 = amministratore
    // Hash della password
    $password_hashed = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Controlla se l'email è già registrata
    $checkQuery = "SELECT * FROM utenti WHERE email = :email";
    $checkStmt = $db->prepare($checkQuery);
    $checkStmt->execute(['email' => $email]);

    if ($checkStmt->fetch()) {
        $error = "Errore: Email già in uso!";
    } else {
        try {
            $query = "INSERT INTO utenti (email, password, ruolo) VALUES (:email, :password, :ruolo)";
            $stmt = $db->prepare($query);

            // Binding dei parametri
            $stmt->bindValue(':email', $email, PDO::PARAM_STR);
            $stmt->bindValue(':password', $password_hashed, PDO::PARAM_STR);
            $stmt->bindValue(':ruolo', $ruolo, PDO::PARAM_INT);

            // Esecuzione della query
            $stmt->execute();

            // Registrazione completata: mostra messaggio di conferma
            $success = "Registrazione completata con successo! <a href='login.php'>Clicca qui per accedere</a>.";

            // Eventualmente, se preferisci, puoi disattivare l'invio multiplo del form.
            // Ad esempio, con una redirect via header o un semplice unset dei dati POST.
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
    <!-- Inclusione di Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex justify-content-center align-items-center vh-100">

<div class="card p-4 shadow" style="width: 350px;">
    <h2 class="text-center text-primary mb-4">Registrati</h2>

    <?php if (isset($error)) { ?>
        <div class="alert alert-danger"><?= $error; ?></div>
    <?php } ?>

    <?php if (isset($success)) { ?>
        <div class="alert alert-success"><?= $success; ?></div>
    <?php } ?>

    <form method="POST" action="registrazione.php">
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" placeholder="Inserisci la tua email" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control" placeholder="Inserisci la tua password" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Ruolo</label>
            <select name="ruolo" class="form-select" required>
                <option value="0">Utente normale</option>
                <option value="1">Amministratore</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary w-100">Registrati</button>
    </form>

    <p class="text-center mt-3">
        Hai già un account? <a href="login.php">Accedi</a>
    </p>
</div>

<!-- Inclusione di Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
