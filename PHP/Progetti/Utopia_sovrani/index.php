<?php

$title= 'Home Sovrani';

require 'header.php';

?>

<div class="container mt-5 rounded-4 p-5 bg-body-tertiary">
    <div class="container my-5">
        <h3 class="text-center mb-4">Seleziona un opzione per eseguire un operazione CRUD:</h3>
        <div class="row text-center">
            <div class="col-12 mb-4">
                <div class="card shadow-sm bg-white">
                    <div class="card-body">
                        <h5 class="card-title">Aggiungi Sovrano</h5>
                        <a href="inserisci.php" class="btn btn-primary"><i class="bi bi-plus-circle"></i> Aggiungi</a>
                    </div>
                </div>
            </div>
            <div class="col-12 mb-4">
                <div class="card shadow-sm bg-white">
                    <div class="card-body">
                        <h5 class="card-title">Visualizza Sovrani</h5>
                        <a href="visualizza.php" class="btn btn-success"><i class="bi bi-table"></i> Visualizza</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
require 'footer.php';
?>
