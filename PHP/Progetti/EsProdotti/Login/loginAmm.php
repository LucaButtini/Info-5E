<?php
session_start();
require '../Config/DBConn.php';

// Caricamento della configurazione DB
$conf = require '../Config/db_conf.php';
$db = DbConn::getConnection($conf);

$queryCheck = "SELECT COUNT(*) as count FROM amministratori;";
try {
    $stmt = $db->prepare($queryCheck);
    $stmt->execute();
    $conta = $stmt->fetch();
    $stmt->closeCursor();
} catch(PDOException $e) {
    echo 'Errore controllo';
}

if ($conta && $conta->count == 0) {
    $adminDef = ['admin', 'admin@admin.com'];
    $hashPwd = password_hash('admin123', PASSWORD_DEFAULT);

    $qIns = "INSERT INTO amministratori(username, email, password) VALUES(:username, :email, :password)";
    try {
        $stmt = $db->prepare($qIns);
        $stmt->bindValue(':username', $adminDef[0]);
        $stmt->bindValue(':email', $adminDef[1]);
        $stmt->bindValue(':password', $hashPwd);
        $stmt->execute();
    } catch(PDOException $e) {
        echo 'Errore creazione amministratore';
    }

}
// Login
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = trim($_POST['email']);
    $password = $_POST['password'];


    $query = "SELECT * FROM amministratori WHERE username = :username";
    $stmt = $db->prepare($query);
    $stmt->bindValue(':username', $username);
    $stmt->execute();
    $admin = $stmt->fetch();

    // Verifica della password
    if ($admin && password_verify($password, $admin->password)) {
        $_SESSION['admin'] = $email;
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
    <title>Login Amministratore</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex justify-content-center align-items-center vh-100 bg-light">

<div class="card p-4 shadow-lg" style="width: 350px;">
    <h2 class="text-center text-primary">Login Amministratore</h2>

    <?php if (isset($error)) { ?>
        <div class="alert alert-danger"><?= $error; ?></div>
    <?php } ?>

    <form method="POST" action="loginAmm.php">
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

    <div class="mt-4 text-center">
        <p>
            Sei un utente? <a href="loginUtente.php">Accedi al tuo account</a>
        </p>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
