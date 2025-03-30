<?php
echo 'Buttini Luca 5E fila B ';

// varibili che contengono array di settimane e mesi che servono poi la creazione del form dinamico
$settimane= require_once 'periodo.php';
$mesi= require_once 'mesi.php';


?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inserimento</title>
</head>
<body>
    <h1>Inserimento Form</h1>
    <!-- form che invia dati usando il metodo post-->
    <form action="action_page.php" method="post">

        <?php foreach ( $mesi as $mese) { ?>
    <h3>Inserisci dati <?= $mese?></label></h3>
            <!-- Creazione dinamica del form di inserimento dati-->
            <!-- Inserimento per ogni mese-->

        <?php foreach ( $settimane as $settimana) { ?>
                    <!-- Inserimento per ogni settimana del mese dei dati

                    Input di tipo number per inserire il numero di assenze

                    Nel name dell'input tratto i dati come fossero un array dato che inserisco più volte la stessa quantità

                    -->
                <h4><?= $settimana ?></h4>
                <label for="<?= $settimana?>assenza">Numero assenze</label><br>
                <input type="number" id="<?= $settimana?>assenza" name="<?= $settimana?>assenza[]" min="0" required  value="0"><br><br>
                <label for="<?= $settimana?>ritardo">Numero ritardi</label><br>
                <input type="number" id="<?= $settimana?>ritardo" name="<?= $settimana?>ritardo[]" min="0" required value="0"><br><br>
                <label for="<?= $settimana?>uscita">Numero uscite anticipate</label><br>
                <input type="number" id="<?= $settimana?>uscita" name="<?= $settimana?>uscita[]" min="0" required value="0"><br><br>

       <?php }

        }?>
        <!-- con un input di tipo hidden dovrei prendere la data e l'ora dell'inserimento dei dati del form.
        Tuttavia rispetto alla richiesta è solo improntata la struttura senza alcuna applicazione
        -->
        <input type="hidden" id="tempo" name="tempo" value="">
        <!-- input di tipo submit per inviare dati alla action page-->
        <input type="submit" value="Invia dati">
    </form>

</body>
</html>
