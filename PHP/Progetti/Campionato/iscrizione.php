<?php

require 'Dbconnection.php';
$config = require('db_config.php');
$db = Dbconnection::getDb($config);

require 'header.php';
?>

    <div class="container bg-dark mt-5 p-5 text-light rounded-4">
        <div class="text-center p-">
            <h1 class="text-primary"><strong>CAMPIONATO AUTOMOBILISTICO</strong></h1>
            <p class="lead">Inserisci i dati riguardanti il campionato.</p>
        </div>
    </div>

<?php
require 'footer.php';
?>