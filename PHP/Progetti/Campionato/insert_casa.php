<?php


$title= 'Case automobilistiche';
require 'header.php';

require 'Dbconnection.php';
$config = require('db_config.php');
$db = Dbconnection::getDb($config);

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $nome_casa = $_POST['nome_casa'];
    $livrea = $_POST['livrea'];


    $query= "INSERT INTO campionato.case_automobilistiche (nome_casa, livrea) VALUES (:nome_casa, :livrea)";

    $stm= $db->prepare($query);

    $stm->bindValue(':nome_casa', $nome_casa);
    $stm->bindValue(':livrea', $livrea);

    $stm->execute();

    header('Location: confirm.html');

    exit();
}


?>
<div class="container bg-dark mt-5 p-5 text-light rounded-4">
    <div class="text-center p-">
        <h1 class="text-primary"><strong>CAMPIONATO AUTOMOBILISTICO</strong></h1>
        <p class="lead">Inserisci i dati riguardanti le case automobilistiche.</p>
    </div>

        <form method="post" action="insert_casa.php">
            <div class="mb-4">
                <label for="nome" class="form-label">Inserisci nome:</label>
                <input type="text" class="form-control" id="nome_casa" name= "nome_casa" placeholder="Nome" required>
            </div>
            <div class="mb-4">
                <label for="cognome" class="form-label">Inserisci cognome:</label>
                <input type="text" class="form-control" id="livrea" name= "livrea" placeholder="Livrea" required>
            </div>
            <button type="submit" class="btn btn-primary"><i class="bi bi-plus-circle"></i> Aggiungi Casa</button>
        </form>
</div>

<?php
require 'footer.php';
?>
