<?php

$title= 'Visualizza';

require 'header.php';

?>


<div class="container bg-dark mt-5 p-5 text-light rounded-4">
    <div class="text-center">
        <h1 class="text-primary"><strong>CAMPIONATO AUTOMOBILISTICO</strong></h1>
    </div>
    <div class="my-5">
        <h3 class="text-center mb-4">Visualizza le informazioni sul campionato:</h3>
        <div class="card custom-card bg-black border border-2 border-white text-white mt-4">
            <img src="Immagini/img1.webp" class="card-img-top custom-img">
            <div class="card-body">
                <h5 class="card-title">Classifica piloti</h5>
                <a href="classifica_piloti.php" class="btn btn-primary"><i class="bi bi-plus-circle"></i>Visualizza</a>
            </div>
        </div>
        <div class="card custom-card bg-black border border-2 border-white text-white mt-4">
            <img src="Immagini/img2.webp" class="card-img-top custom-img">
            <div class="card-body">
                <h5 class="card-title">Classifica case automobilistiche</h5>
                <a href="classifica_case.php" class="btn btn-primary"><i class="bi bi-plus-circle"></i>Visualizza</a>
            </div>
        </div>
        <div class="card custom-card bg-black border border-2 border-white text-white mt-4">
            <img src="Immagini/img3.webp" class="card-img-top custom-img">
            <div class="card-body">
                <h5 class="card-title">Classifica Gare</h5>
                <a href="classifica_gare.php" class="btn btn-primary"><i class="bi bi-plus-circle"></i>Visualizza</a>
            </div>
        </div>
    </div>
</div>




<?php
require 'footer.php';
?>
