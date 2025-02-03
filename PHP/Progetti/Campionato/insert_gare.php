<?php


$title= 'Gare';
require 'header.php';

require 'Dbconnection.php';
$config = require('db_config.php');
$db = Dbconnection::getDb($config);

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $luogo = $_POST['luogo'];
    $data= $_POST['data'];
    $giro_veloce = $_POST['giro_veloce'];


    $query= "INSERT INTO campionato.gare (luogo, data, giro_veloce) VALUES (:luogo, :data, :giro_veloce)";

    $stm= $db->prepare($query);

    $stm->bindValue(':luogo', $luogo);
    $stm->bindValue(':data', $data);
    $stm->bindValue(':giro_veloce', $giro_veloce);


    $stm->execute();

    header('Location: confirm.html');

    exit();
}


?>
<div class="container bg-dark mt-5 p-5 text-light rounded-4">
    <div class="text-center p-">
        <h1 class="text-primary"><strong>CAMPIONATO AUTOMOBILISTICO</strong></h1>
        <p class="lead">Inserisci i dati riguardanti le gare.</p>
    </div>

    <form method="post" action="insert_gare.php">
        <div class="mb-4">
            <label for="luogo" class="form-label">Inserisci il luogo:</label>
            <input type="text" class="form-control" id="luogo" name= "luogo" placeholder="Luogo" required>
        </div>
        <div class="mb-4">
            <label for="data" class="form-label">Inserisci Data:</label>
            <input type="date" class="form-control" id="data" name="data" required>
        </div>
        <div class="mb-4">
            <label for="giro_veloce" class="form-label">Inserisci Giro Veloce:</label>
            <input type="number" class="form-control" id="giro_veloce" name= "giro_veloce" placeholder="Giro Veloce" required>
        </div>


        <button type="submit" class="btn btn-primary"><i class="bi bi-plus-circle"></i> Aggiungi Gara</button>
    </form>
</div>

<?php
require 'footer.php';
?>
