<?php


$title= 'Piloti';
require 'header.php';

require 'Dbconnection.php';
$config = require('db_config.php');
$db = Dbconnection::getDb($config);

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $numero = $_POST['numero'];
    $nome = $_POST['nome'];
    $cognome = $_POST['cognome'];
    $nazionalita = $_POST['nazionalita'];
    $punteggio = $_POST['punteggio'];
    $nome_casa = $_POST['nome_casa'];


    $query= "INSERT INTO campionato.piloti (numero, nome, cognome, nazionalita, punteggio, nome_casa) VALUES (:numero, :nome, :cognome, :nazionalita, :punteggio, :nome_casa)";

    $stm= $db->prepare($query);

    $stm->bindValue(':numero', $numero);
    $stm->bindValue(':nome', $nome);
    $stm->bindValue(':cognome', $cognome);
    $stm->bindValue(':nazionalita', $nazionalita);
    $stm->bindValue(':punteggio', $punteggio);
    $stm->bindValue(':nome_casa', $nome_casa);

    $stm->execute();

    header('Location: confirm.html');

    exit();
}


?>
<div class="container bg-dark mt-5 p-5 text-light rounded-4">
    <div class="text-center p-">
        <h1 class="text-primary"><strong>CAMPIONATO AUTOMOBILISTICO</strong></h1>
        <p class="lead">Inserisci i dati riguardanti i piloti.</p>
    </div>

    <form method="post" action="insert_piloti.php">
        <div class="mb-4">
            <label for="numero" class="form-label">Inserisci Numero:</label>
            <input type="number" class="form-control" id="numero" name= "numero" placeholder="Numero" min="0" required>
        </div>
        <div class="mb-4">
            <label for="nome" class="form-label">Inserisci Nome:</label>
            <input type="text" class="form-control" id="nome" name= "nome" placeholder="Nome" required>
        </div>
        <div class="mb-4">
            <label for="cognome" class="form-label">Inserisci Cognome:</label>
            <input type="text" class="form-control" id="cognome" name= "cognome" placeholder="Cognome" required>
        </div>
        <div class="mb-4">
            <label for="nazionalita" class="form-label">Inserisci Nazionalita:</label>
            <input type="text" class="form-control" id="nazionalita" name= "nazionalita" placeholder="Nazionalità" required>
        </div>
        <div class="mb-4">
            <label for="punteggio" class="form-label">Inserisci Punteggio:</label>
            <input type="number" class="form-control" id="punteggio" name= "punteggio" placeholder="Punteggio" min="0" required>
        </div>
        <div class="mb-4">
            <label for="nome_casa" class="form-label">Inserisci Nome Casa:</label>
            <input type="text" class="form-control" id="nome_casa" name= "nome_casa" placeholder="Nome Casa" required>
        </div>

        <button type="submit" class="btn btn-primary"><i class="bi bi-plus-circle"></i> Aggiungi Pilota</button>
    </form>
</div>

<?php
require 'footer.php';
?>
