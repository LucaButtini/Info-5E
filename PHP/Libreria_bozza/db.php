<?php

// $db= new PDO('mysql:host=localhost;dbname=libreria', 'root', '', [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_OBJ]);


// Configura la connessione al database MySQL
try {
    $db = new PDO('mysql:host=localhost;dbname=libreria', 'root', '', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Modalità di errore
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ // Fetch come oggetti
    ]);
} catch (PDOException $e) {
    // Gestione dell'errore in caso di fallimento nella connessione
    error_log($e->getMessage() . '---' . date('Y-m-d H:i:s' . "\n"), 3, 'log/database_log');
}
