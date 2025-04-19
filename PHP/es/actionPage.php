<?php
require 'Config/DBConn.php';
$conf = require 'Config/db_conf.php';
$db   = DbConn::getConnection($conf);

// Prendi dati dal form
$email    = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

if (!$email || !$password) {
    die('Email e password richieste. <a href="register.php">Registrati qui</a>.');
}

try {
    // Prepara la query per trovare l'utente
    $stmt = $db->prepare("
        SELECT u.id, u.password, r.role_name
        FROM users u
        JOIN user_roles ur ON u.id = ur.user_id
        JOIN roles r ON ur.role_id = r.id
        WHERE u.email = :email
    ");
    $stmt->execute(['email' => $email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        die('Utente non trovato. <a href="register.php">Registrati qui</a>.');
    }

    // Verifica la password (usa password_hash al momento della registrazione)
    if (password_verify($password, $user['password'])) {
        // Password corretta: mostra il ruolo
        $role = $user['role_name'];
        echo "Benvenuto! Hai effettuato l’accesso come <strong>$role</strong>.";
        // Qui puoi ad es. fare switch($role) per reindirizzare a sezioni diverse
        // header("Location: dashboard_$role.php");
    } else {
        die('Password errata. <a href="register.php">Registrati qui</a>.');
    }

} catch (PDOException $e) {
    error_log($e->getMessage());
    die('Errore di connessione al database. <a href="register.php">Registrati qui</a>.');
}
