<?php
// varibili che contengono array di settimane e mesi
$settimane= require_once 'periodo.php';
$mesi= require_once 'mesi.php';

//controllo per riuscita invio dati al form
if($_SERVER['REQUEST_METHOD']=='POST'){
//prendo con metodo post i dati del form
    $assenze= $_POST['assenza']??[];
    $ritardi= $_POST['ritardo']??[];
    $uscite= $_POST['uscita']??[];

    //sommo i dati negli array coi numeri inserirti di assenze, ritardi e uscite
    // in modo da avere il totale
    $totAss=array_sum($assenze);
    $totRit=array_sum($ritardi);
    $totUscite= array_sum($uscite);




}else{ //se non va a buon fine invio dati al form stampa errore
    echo 'errore invio dati al form';
}
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Riepilogo</title>
</head>
<body>
<h1>Riepilogo Form</h1>
<!-- stampa numero assenze, ritardi  e uscite del periodo estivo-->

<!-- ho effettuato una stampa che tuttavia rispetto alla richiesta del compito non da alcun valore, c'è solo la struttura della possibile stampa-->
<h2>Totale periodo</h2>
<p>Totale Assenze <?=$totAss ?></p>
<p>Totale ritardi <?=$totRit ?></p>
<p>Totale uscite <?=$totUscite ?></p>
<h2>Totale mensile</h2>
<h3>Numero Assenze</h3>
<?php
//riepilogo per ogni mese di uscite, ritardi e assenze

foreach ($mesi as $mese) { ?>
    <h4><?=$mese ?></h4>

        <?php foreach ($assenze as $a) { ?>
             <p>Assenze[<?= $a ?>]</p>
        <?php }?>
<?php

}
    ?>

<h3>Numero Ritardi</h3>
<?php foreach ($mesi as $mese) { ?>
    <h4><?=$mese ?></h4>


        <?php foreach ($ritardi as $r) { ?>
            <p>Assenze  [<?= $r ?>]</p>
        <?php }?>
        <?php

}
?>

<h3>Numero Uscite</h3>
<?php foreach ($mesi as $mese) { ?>
    <h4><?=$mese ?></h4>


        <?php foreach ($uscite as $u) { ?>
            <p>Assenze  [<?= $u ?>]</p>
        <?php }?>
        <?php

}
?>

</body>
</html>
