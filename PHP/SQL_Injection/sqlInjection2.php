<?php
$pdo = new PDO("mysql:host=localhost;dbname=sqli2", "root", "");
$id = $_GET['id'] ?? '';
$model = $_GET['model'] ?? '';
$content=[];

//$query = "UPDATE Tablet SET Model='$model' WHERE TabletId='$id'";//questo impatta l'integrità dei dati
$query = "UPDATE Tablet SET Model=:model WHERE TabletId=:id";//questo impatta l'integrità dei dati
$stmt = $pdo->prepare($query);
$stmt->bindValue(':model', $model);
$stmt->bindValue(':id', $id);
$stmt->execute();


$query="SELECT * FROM Tablet";
$stmt = $pdo->prepare($query);
$stmt->execute();

// Fetch  result
while ($row = $stmt->fetch()) {
    $content[]=$row;
}
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
    <?php foreach ($content as $row) { ?>
        <p><?= $row['TabletId']?></p>
        <p><?= $row['Brand']?></p>
        <p><?= $row['Model']?></p>
        <hr>
    <?php }?>
    </body>
    </html>
