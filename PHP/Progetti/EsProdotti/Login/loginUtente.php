<?php
session_start();
require '../Config/DBConn.php';

$conf = require '../Config/db_conf.php';
$db = DbConn::getConnection($conf);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM utenti WHERE username = :username";
    $stmt = $db->prepare($query);

    $stmt->bindValue(':username', $username);
    $stmt->execute();
    $user = $stmt->fetch();

    //verifica password
    if ($user && password_verify($password, $user->password)) {
        $_SESSION['user'] = $username;

        header("Location: ../index.php");
        exit;
    } else {
        $error = "Credenziali errate!";
    }
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex justify-content-center align-items-center vh-100 bg-light">

<div class="card p-4 shadow-lg" style="width: 350px;">
    <h2 class="text-center text-primary">Login Utente</h2>

    <?php if (isset($error)) { ?>
        <div class="alert alert-danger"><?= $error; ?></div>
    <?php } ?>

    <form method="POST" action="loginUtente.php">
        <div class="mb-3">
            <label class="form-label" for="username">Username:</label>
            <input type="text" name="username" id="username" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary w-100">Accedi</button>
    </form>

    <p class="text-center mt-3">
        Non hai un account? <a href="registrazione.php">Registrati</a>
    </p>
    <p class="text-center mt-1">
        Sei un amministratore? <a href="loginAmm.php">Accedi al tuo account</a>
    </p>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
