<?php
//prendo l'array contenente i tipi di album
$albums=require_once 'albums.php';
//numero album tipi in array
$num= count($albums);

//echo $num;
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div style="text-align: center; font-size:large">
    <h1 style="color: red">RIPASSO</h1>
    <!--form per inserimento dei dati-->
    <form action="action.php" method="post">
        <!--inserimento nome, password e email -->
        <label for="user">Inserisci username:</label><br>
        <input type="text" required placeholder="user" name="user" id="user"><br><br>
        <label for="password">Inserisci password:</label><br>
        <input type="password" required placeholder="password" name="password" id="password"><br><br>
        <label for="email">Inserisci email:</label><br>
        <input type="email" required placeholder="nome@dominio.com" name="email" id="email"><br><br>

        <!--creo i dropdown per la quantita di prodotti-->
        <?php
        //ciclo l'array
        for($i=0; $i<$num; $i++) { ?>
            <!--dropdown prodotti-->
            <p style="color: blue">Scegli opzioni prodotto <?= $i+1?></p>
            <label for="<?= $i?>Tip">Tipologia</label><br>
            <select id="<?= $i?>Tip" name="album[]"><br><br>
                <option hidden disabled selected value="">Seleziona</option>
                    <?php foreach ($albums as $id=>$al) {?>
                        <option value="<?= $id ?>"> <?= $al ?></option>
                    <?php } ?>
            </select>

        <br>
            <!--inserisci quantità prodotti desiderata. Quantità la metto come array dato che ne ho una per ogni prodotto-->
        <label for="<?= $i?>Qu">quantità</label><br>
        <input type="number" id="<?= $i?>Qu" name="quantita[]" value="0" min="0"><br>
        <?php } ?>
    <input type="submit" value="submit">
    </form>
</div>

</body>
</html>
