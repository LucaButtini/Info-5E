<?php
// Connessione al database
require 'Dbconnection.php';
$config = require('db_config.php');
$db = Dbconnection::getDb($config);

// Gestione invio form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        if (isset($_POST["nome_casa"])) {
            // Inserimento Casa Automobilistica
            $stmt = $db->prepare("INSERT INTO case_automobilistiche (nome_casa, livrea) VALUES (:nome_casa, :livrea)");
            $stmt->execute([
                ":nome_casa" => $_POST["nome_casa"],
                ":livrea" => $_POST["livrea"]
            ]);
            echo "<div class='alert alert-success'>Casa Automobilistica aggiunta!</div>";
        } elseif (isset($_POST["numero"]) && isset($_POST["nome"])) {
            // Inserimento Pilota
            $stmt = $db->prepare("INSERT INTO piloti (numero, nome, cognome, nazionalita, punteggio, nome_casa) VALUES (:numero, :nome, :cognome, :nazionalita, :punteggio, :nome_casa)");
            $stmt->execute([
                ":numero" => $_POST["numero"],
                ":nome" => $_POST["nome"],
                ":cognome" => $_POST["cognome"],
                ":nazionalita" => $_POST["nazionalita"],
                ":punteggio" => $_POST["punteggio"],
                ":nome_casa" => $_POST["nome_casa"]
            ]);
            echo "<div class='alert alert-success'>Pilota aggiunto!</div>";
        } elseif (isset($_POST["luogo"])) {
            // Inserimento Gara
            $stmt = $db->prepare("INSERT INTO gare (luogo, data, giro_veloce) VALUES (:luogo, :data, :giro_veloce)");
            $stmt->execute([
                ":luogo" => $_POST["luogo"],
                ":data" => $_POST["data"],
                ":giro_veloce" => $_POST["giro_veloce"]
            ]);
            echo "<div class='alert alert-success'>Gara aggiunta!</div>";
        } elseif (isset($_POST["numero_pilota"])) {
            // Inserimento Partecipazione
            $stmt = $db->prepare("INSERT INTO partecipare (numero_pilota, id_gara) VALUES (:numero_pilota, :id_gara)");
            $stmt->execute([
                ":numero_pilota" => $_POST["numero_pilota"],
                ":id_gara" => $_POST["id_gara"]
            ]);
            echo "<div class='alert alert-success'>Partecipazione registrata!</div>";
        }
    } catch (PDOException $e) {
        echo "<div class='alert alert-danger'>Errore: " . $e->getMessage() . "</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestione Campionato</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-light">
<div class="container mt-5">
    <h1 class="text-center text-primary">Gestione Campionato Automobilistico</h1>

    <div class="card bg-secondary p-3 mb-4">
        <h3 class="text-center">Inserisci Casa Automobilistica</h3>
        <form method="post">
            <input type="text" class="form-control mb-2" name="nome_casa" placeholder="Nome Casa" required>
            <input type="text" class="form-control mb-2" name="livrea" placeholder="Livrea" required>
            <button type="submit" class="btn btn-primary w-100">Aggiungi Casa</button>
        </form>
    </div>

    <div class="card bg-secondary p-3 mb-4">
        <h3 class="text-center">Inserisci Pilota</h3>
        <form method="post">
            <input type="number" class="form-control mb-2" name="numero" placeholder="Numero Pilota" required>
            <input type="text" class="form-control mb-2" name="nome" placeholder="Nome" required>
            <input type="text" class="form-control mb-2" name="cognome" placeholder="Cognome" required>
            <input type="text" class="form-control mb-2" name="nazionalita" placeholder="Nazionalità" required>
            <input type="number" class="form-control mb-2" name="punteggio" placeholder="Punteggio" required>
            <input type="text" class="form-control mb-2" name="nome_casa" placeholder="Nome Casa" required>
            <button type="submit" class="btn btn-primary w-100">Aggiungi Pilota</button>
        </form>
    </div>

    <div class="card bg-secondary p-3 mb-4">
        <h3 class="text-center">Inserisci Gara</h3>
        <form method="post">
            <input type="text" class="form-control mb-2" name="luogo" placeholder="Luogo Gara" required>
            <input type="date" class="form-control mb-2" name="data" required>
            <input type="number" step="0.01" class="form-control mb-2" name="giro_veloce" placeholder="Giro Veloce" required>
            <button type="submit" class="btn btn-primary w-100">Aggiungi Gara</button>
        </form>
    </div>

    <div class="card bg-secondary p-3 mb-4">
        <h3 class="text-center">Registra Partecipazione</h3>
        <form method="post">
            <input type="number" class="form-control mb-2" name="numero_pilota" placeholder="Numero Pilota" required>
            <input type="number" class="form-control mb-2" name="id_gara" placeholder="ID Gara" required>
            <button type="submit" class="btn btn-primary w-100">Registra Partecipazione</button>
        </form>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
