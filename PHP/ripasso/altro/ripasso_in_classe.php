<?php

$alimentari= require_once 'alimentari.php';

$duplicatoAlimentari=[];
foreach ($alimentari as $a=>$item)
    $duplicatoAlimentari[$a]=$item;

//var_dump($duplicatoAlimentari);


// copia in un altro modo
$secondoDuplicatoCopiaAl=[];
foreach ($alimentari as $alimento=>$item)
    $secondoDuplicatoCopiaAl+=[$alimento=>$item];

var_dump($secondoDuplicatoCopiaAl);
echo '<br><br>';

$tipoAl=array_keys($alimentari);
var_dump($tipoAl);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
<?php foreach($duplicatoAlimentari as $tipoAlimento => $alimenti){?>
    <h2><?= $tipoAlimento?></h2>
    <?php foreach($alimenti as $sceltaAlimento){?>
        <p><?= $sceltaAlimento?></p>
    <?php } ?>
<?php } ?>
<hr>
<p><?= $alimentari['frutta'][0] ?></p>
<hr>
<?php foreach ($alimentari['frutta'] as $item) { ?>
    <p> <?= $item?> </p>
<?php } ?>
<hr>
<form action="action_page.php" method="post">
    <?php for($i=0; $i<count($alimentari); $i++) { ?>
        <p class="tipoAlimento"><?= $tipoAl[$i]?></p><br>
        <label for="<?= $i?>">Valutazione del servizio</label><br>
        <input type = "number" name="<?= $i?>" id="<?= $i?>" min="1" max="5"><br>
        <label for="<?= $i?>Car">carta di credito</label><br>
        <input type = "checkbox" name="<?= $i?>Car" id="<?= $i?>Car"><br>
        <label for="<?= $i?>Cons">consegna domicilio</label><br>
        <input type = "checkbox" name="<?= $i?>Cons" id="<?= $i?>Cons"><br>
    <?php } ?>
    <input type="hidden" name="count" value="<?= count($alimentari)?>">
    <input type="submit" value="invia">
</form>
</body>
</html>
