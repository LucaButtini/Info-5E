<?php
$nazioni= require_once 'nazioni.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $nomeAz= $_POST["nome"]??null;
    $cittaAz= $_POST["citta"]??null;
    $indirizzoAz= $_POST["indirizzo"]??null;
    $telefonoAz = $_POST["numero"]??null;
    $naz= $_POST["naz"]??[];
    $sedi=[];

    foreach($nazioni as $key => $value){
        $sedi[$key]= $_POST[$key]??null;
    }

}else{
    echo "errore invio form";
}

?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>dati form</title>
</head>
<body>
    <h1>Riepilogo</h1>
    <h3>Dati azienda</h3>
    <h4>Nome</h4>
    <p><?= $nomeAz ?></p>
    <h4>Nome</h4>
    <p><?= $cittaAz ?></p>
    <h4>Nome</h4>
    <p><?= $indirizzoAz ?></p>
    <h4>Nome</h4>
    <p><?= $telefonoAz ?></p>

    <hr>

    <h3>Sedi</h3>
    <?php foreach ($naz as $n) { ?>
        <p><?= $n?></p>
    <?php }?>

    <h3>Numero sedi</h3>
    <?php foreach ($sedi as $nazione => $num) {
        if($num > 0) {
        ?>
        <p><?= $nazioni[$nazione]?> [<?= $num?>]</p>
    <?php }
    }?>

</body>
</html>
