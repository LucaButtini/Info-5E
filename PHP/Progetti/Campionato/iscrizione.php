<?php

require 'Dbconnection.php';
$config = require('db_config.php');
$db = Dbconnection::getDb($config);

require 'header.php';
?>

    <div class="container bg-dark mt-5 p-5 text-light rounded-4">
        <div class="text-center p-">
            <h1 class="text-primary"><strong>CAMPIONATO AUTOMOBILISTICO</strong></h1>
        </div>

        <div class="container my-5">
            <h3 class="text-center mb-4">Inserisci i dati riguardanti il campionato.</h3>
            <div class="row text-center">
                <div class="col-12 mb-4">
                    <div class="card shadow-sm bg-black text-white border border-2 border-white">
                        <div class="card-body">
                            <h5 class="card-title">Case automobilistiche</h5>
                            <a href="insert_casa.php" class="btn btn-primary"><i class="bi bi-plus-circle"></i>Inserisci</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 mb-4">
                    <div class="col-12 mb-4">
                        <div class="card shadow-sm bg-black text-white border border-2 border-white">
                            <div class="card-body">
                                <h5 class="card-title">Piloti</h5>
                                <a href="insert_piloti.php" class="btn btn-primary"><i class="bi bi-plus-circle"></i>Inserisci</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 mb-4">
                    <div class="col-12 mb-4">
                        <div class="card shadow-sm bg-black text-white border border-2 border-white">
                            <div class="card-body">
                                <h5 class="card-title">Gare</h5>
                                <a href="insert_casa.php" class="btn btn-primary"><i class="bi bi-plus-circle"></i>Inserisci</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 mb-4">
                    <div class="col-12 mb-4">
                        <div class="card shadow-sm bg-black text-white border border-2 border-white">
                            <div class="card-body">
                                <h5 class="card-title">Partecipazioni</h5>
                                <a href="insert_casa.php" class="btn btn-primary"><i class="bi bi-plus-circle"></i>Inserisci</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

<?php
require 'footer.php';
?>