<?php
session_start();
require 'Config/DbConn.php';
$conf = require 'Config/db_conf.php';
$db = DbConn::getConnection($conf);

$error = "";
$password_hash = password_hash("admin123", PASSWORD_DEFAULT);

// INSERIMENTO UTENTI DI DEFAULT



// Personale
$stmt = $db->query("SELECT COUNT(*) as count FROM personale");
//arr assoc con chiave 'count' tornata dalla query con count(*)
if ($stmt->fetch()['count'] == 0) {
    $users = [
        ['admin01', $password_hash],
        ['admin02', $password_hash],
    ];
    $insert = $db->prepare("INSERT INTO personale (username, password) VALUES (?, ?)");
    foreach ($users as $user) {
        $insert->execute($user);
    }
    $insert->closeCursor();
}
$stmt->closeCursor();

// Insegnanti
$stmt = $db->query("SELECT COUNT(*) as count FROM insegnanti");
if ($stmt->fetch()['count'] == 0) {
    $users = [
        ['insegnante01', $password_hash],
        ['insegnante02', $password_hash],
    ];
    $insert = $db->prepare("INSERT INTO insegnanti (username, password) VALUES (?, ?)");
    foreach ($users as $user) {
        $insert->execute($user);
    }
    $insert->closeCursor();
}
$stmt->closeCursor();

// Studenti
$stmt = $db->query("SELECT COUNT(*) as count FROM studenti");
if ($stmt->fetch()['count'] == 0) {
    $users = [
        ['studente01', $password_hash],
        ['studente02', $password_hash],
    ];
    $insert = $db->prepare("INSERT INTO studenti (username, password) VALUES (?, ?)");
    foreach ($users as $user) {
        $insert->execute($user);
    }
    $insert->closeCursor();
}
$stmt->closeCursor();

// Genitori
$stmt = $db->query("SELECT COUNT(*) as count FROM genitori");
if ($stmt->fetch()['count'] == 0) {
    $users = [
        ['genitore01', $password_hash],
        ['genitore02', $password_hash],
    ];
    $insert = $db->prepare("INSERT INTO genitori (username, password) VALUES (?, ?)");
    foreach ($users as $user) {
        $insert->execute($user);
    }
    $insert->closeCursor();
}
$stmt->closeCursor();

// logica per prendere i ruoli
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $username = trim($_POST['username']);
    $password = $_POST['password'];
    $ruolo = $_POST['ruolo'];

    $nomeTabella = "";
    switch ($ruolo) {
        case "personale":
            $nomeTabella = "personale";
            break;
        case "insegnante":
            $nomeTabella = "insegnanti";
            break;
        case "studente":
            $nomeTabella = "studenti";
            break;
        case "genitore":
            $nomeTabella = "genitori";
            break;
        default:
            $error = "Ruolo non valido.";
    }

    if (!$error) {
        //punto di domanda  un modo per indicare che un valore verrà inserito più tardi in modo sicuro
        $query = "SELECT id, username, password FROM $nomeTabella WHERE username = ?";
        $stmt = $db->prepare($query);
        $stmt->execute([$username]);//valore che inserisco poi nella query con "?"
        $user = $stmt->fetch();
        $stmt->closeCursor();

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['username'] = $user['username'];
            $_SESSION['ruolo'] = $ruolo;
            header("Location: action.php");
            exit();
        } else {
            $error = "Credenziali non valide.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Login - Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center mb-4">Login - Registro Elettronico</h1>

    <?php if ($error){ ?>
        <div class="alert alert-danger text-center"><?= $error ?></div>
    <?php } ?>

    <form action="login.php" method="post" class="w-50 mx-auto">
        <div class="mb-3">
            <label for="ruolo" class="form-label">Ruolo:</label>
            <select name="ruolo" id="ruolo" class="form-select" required>
                <option value="">-- Seleziona --</option>
                <option value="personale">Personale</option>
                <option value="insegnante">Insegnante</option>
                <option value="studente">Studente</option>
                <option value="genitore">Genitore</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="username" class="form-label">Username:</label>
            <input type="text" name="username" id="username" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password:</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary w-100">Accedi</button>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
