<?php


$title= 'Partecipazioni';
require 'header.php';

require 'Dbconnection.php';
$config = require('db_config.php');
$db = Dbconnection::getDb($config);

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $numero_pilota = $_POST['numero_pilota'];
    $id_gara= $_POST['id_gara'];


    $query= "INSERT INTO campionato.partecipare (numero_pilota, id_gara) VALUES (:numero_pilota, :id_gara)";

    $stm= $db->prepare($query);

    $stm->bindValue(':numero_pilota', $numero_pilota);
    $stm->bindValue(':id_gara', $id_gara);


    $stm->execute();

    header('Location: confirm.html');

    exit();
}


?>
<div class="container bg-dark mt-5 p-5 text-light rounded-4">
    <div class="text-center p-">
        <h1 class="text-primary"><strong>CAMPIONATO AUTOMOBILISTICO</strong></h1>
        <p class="lead">Inserisci i dati riguardanti le partecipazioni.</p>
    </div>

    <form method="post" action="insert_partecipazioni.php">
        <div class="mb-4">
            <label for="numero_pilota" class="form-label">Inserisci numero pilota:</label>
            <input type="number" class="form-control" id="numero_pilota" name= "numero_pilota" placeholder="Numero Pilota" required>
        </div>
        <div class="mb-4">
            <label for="id_gara" class="form-label">Inserisci id gara:</label>
            <input type="number" class="form-control" id="id_gara" name= "id_gara" placeholder="Id gara" required>
        </div>
        <button type="submit" class="btn btn-primary"><i class="bi bi-plus-circle"></i> Aggiungi Partecipazione</button>
    </form>
</div>

<?php
require 'footer.php';
?>
