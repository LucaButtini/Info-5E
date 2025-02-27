<?php
$count= $_POST['count'] ?? '';

$valutazioni=[];
$pagamenti=[];
$domicilio=[];
for($i=0; $i<$count; $i++){
    if(isset($_POST[$i."Val"]))
        $valutazioni[]= "Valutazione".($i+1).": ".$_POST[$i."Val"];
    else{
        $valutazioni[]= "Valutazione".($i+1).": nessuna valutazione";
    }
    if(isset($_POST[$i."Car"]))
        $pagamenti[]= "Pagamento".($i+1).": con carta di credito";
    else {
        $pagamenti[] = "Valutazione" . ($i + 1) . ": senza carta di credito";
    }
    if(isset($_POST[$i."Car"]))
        $domicilio[]= "Consegna".($i+1).": consegna a domicilio";
    else {
        $domicilio[] = "Consegne" . ($i + 1) . ": no consegna a domicilio";
    }
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
<?php for($i=0; $i<$count; $i++) { ?>
<p><?= $valutazioni[$i]?></p>
<p><?= $domicilio[$i]?></p>
<p><?= $pagamenti[$i]?></p>
<?php }?>
</body>
</html>
