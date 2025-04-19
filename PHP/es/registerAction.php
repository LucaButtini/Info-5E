<?php
require 'Config/DBConn.php';
$conf = require 'Config/db_conf.php';
$db   = DbConn::getConnection($conf);

// Prendi i dati dal form
$email    = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';
$role     = $_POST['role'] ?? '';

if (!$email || !$password || !$role) {
    die('Tutti i campi sono obbligatori.');
}

try {
    // Verifica se l'email esiste già
    $stmt = $db->prepare("SELECT id FROM users WHERE email = :email");
    $stmt->execute(['email' => $email]);
    $existingUser = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($existingUser) {
        die('email è già in uso.');
    }

    // Crea un hash della password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Inserisci l'utente nella tabella users
    $stmt = $db->prepare("INSERT INTO users (email, password) VALUES (:email, :password)");
    $stmt->execute(['email' => $email, 'password' => $hashedPassword]);

    // Ottieni l'id dell'utente appena creato
    $userId = $db->lastInsertId();

    // Trova il ruolo selezionato
    $stmt = $db->prepare("SELECT id FROM roles WHERE role_name = :role");
    $stmt->execute(['role' => $role]);
    $roleData = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$roleData) {
        die('Ruolo non valido.');
    }

    // Associa l'utente al ruolo
    $roleId = $roleData['id'];
    $stmt = $db->prepare("INSERT INTO user_roles (user_id, role_id) VALUES (:user_id, :role_id)");
    $stmt->execute(['user_id' => $userId, 'role_id' => $roleId]);

    // Registrazione riuscita
    echo "Registrazione completata con successo! Ora puoi <a href='index.php'>accedere</a>.";

} catch (PDOException $e) {
    error_log($e->getMessage());
    die('Errore di connessione al database.');
}
