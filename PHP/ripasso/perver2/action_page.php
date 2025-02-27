<?php
$nazioni= require_once 'azienda.php';

$num= count($nazioni);


if($_SERVER['REQUEST_METHOD']=='POST'){
    $nome = $_POST['nome']??null;
    $citta = $_POST['citta']??null;
    $indirizzo = $_POST['indirizzo']??null;
    $num_tel=$_POST['numero']??null;
    $naz=$_POST['naz']??[];
    $francia=$_POST['francia']??null;
    $spagna=$_POST['spagna']??null;
    $germania=$_POST['germania']??null;
    $inghilterra=$_POST['inghilterra']??null;
    $statiUniti=$_POST['stati uniti']??null;

    if(empty($nome) || empty($citta) || empty($indirizzo) || empty($num_tel) || empty($naz) || empty($spagna) || empty($germania) || empty($inghilterra) || empty($statiUniti)){
        echo 'devi inserire tutti i dati';
        exit;
    }

    $raggruppamento=[];





}else{
    echo 'errore';
    exit;
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
    <h2>Azienda</h2>
    <h4>Nome</h4>
    <p><?= $nome?></p>
    <h4>CItta</h4>
    <p><?= $citta?></p>
    <h4>Indirizzo</h4>
    <p><?= $indirizzo?></p>
    <h4>Numero tel</h4>
    <p><?= $num_tel?></p>
    <h4>Nazioni estere</h4>
    <?php for($i=0; $i<count($naz); $i++) {?>
        <p><?= $naz[$i]?></p>
    <?php } ?>
</body>
</html>
