<?php



$title= 'Inserisci sovrani';
require 'header.php';

spl_autoload_register(function($class){
    include $class.'.php';
});
use Config\DbConnection;


//require './Config/DbConnection.php';

$conf = require './Config/DBconfig.php';

$db= DbConnection::getDb($conf);


?>

<div class="container mt-5 rounded-4 p-5 bg-body-tertiary">
    <div class="text-center p-3">
        <h2 class="text-danger"><strong>Inserisci i sovrani:</strong></h2>
    </div>
    <form action="inserisci.php" method="post">
        <div class="mb-3">
            <label for="numero">Inserisci Numero:</label>
            <input type="number" class="form-control" id="numero" name="numero" placeholder="Numero" min="0" required>
        </div>
        <div class="mb-3">
            <label for="nome">Inserisci Nome:</label>
            <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" required>
        </div>
        <div class="mb-3">
            <label for="data-inizio">Inserisci Data Inizio Regno:</label>
            <input type="date" class="form-control" id="data-inizio" name="data-inizio" placeholder="gg/mm/aaaa" required>
        </div>
        <div class="mb-3">
            <label for="data-fine">Inserisci Data Fine Regno:</label>
            <input type="date" class="form-control" id="data-fine" name="data-fine" placeholder="gg/mm/aaaa">
        </div>
        <div class="mb-3">
            <label for="immagine">Inserisci Immagine:</label>
            <input type="text" class="form-control" id="immagine" name="immagine" placeholder="Immagine" required>
        </div>
        <div class="mb-3">
            <label for="predecessore_numero">Numero Predecessore:</label>
            <input type="number" class="form-control" id="predecessore_numero" name="predecessore_numero" placeholder="Numero Predecessore">
        </div>
        <div class="mb-3">
            <label for="predecessore_nome">Nome Predecessore:</label>
            <input type="text" class="form-control" id="predecessore_nome" name="predecessore_nome" placeholder="Nome Predecessore">
        </div>
        <div class="mb-3">
            <label for="successore_numero">Numero Successore:</label>
            <input type="number" class="form-control" id="successore_numero" name="successore_numero" placeholder="Numero Successore">
        </div>
        <div class="mb-3">
            <label for="successore_nome">Nome Successore:</label>
            <input type="text" class="form-control" id="successore_nome" name="successore_nome" placeholder="Nome Successore">
        </div>
        <button type="submit" class="btn btn-primary"><i class="bi bi-plus-circle"></i> Aggiungi Sovrano</button>
    </form>
</div>

<?php
require 'footer.php';
?>
