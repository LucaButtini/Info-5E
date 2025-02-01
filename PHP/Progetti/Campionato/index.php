<?php

require 'Dbconnection.php';

$config= require('db_config.php');

$db= Dbconnection::getDb($config);

require 'header.php';
?>


<div class="container bg-dark mt-5 p-5 text-light rounded-4">
    <div class="text-center p-">
        <h1 class="text-primary"><strong>CAMPIONATO AUTOMOBILISTICO</strong></h1>
        <p class="lead">Benvenuti al campionato automobilistico della classe 5-E IIS Viola Marchesini.</p>
    </div>

    <div class="text-center my-4">
        <img src="Immagini/campionato.webp" class="rounded-4" id="img-camp">
    </div>
</div>

<?php
require 'footer.php';
?>
