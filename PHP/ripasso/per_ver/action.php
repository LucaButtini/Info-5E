<?php
$albums=require_once 'albums.php';

if($_SERVER['REQUEST_METHOD']=='POST'){
    //prendo i dati dal form, se non sono settati metto valori di default
    $user=$_POST['user']??null;
    $password=$_POST['password']??null;
    $email=$_POST['email']??null;
    $ordini = $_POST['album'] ?? [];
    $quantita=$_POST['quantita']??[];

    //controllo se variabile è empty
    if(empty($user) || empty($password) || empty($email)){
        echo 'devi inserire tutti i dati';
        exit;
    }

    //prodotti
    $ordiniUniti=[];

    //inserisco nell'array i prodotti che hanno quantita >0
    foreach($ordini as $i=>$ord){
        if($quantita[$i] != 0){
            //se non è settata la quantita non viene inserito
            if(!isset($ordiniUniti[$ord])){
                $ordiniUniti[$ord]=0;
            }
            //sommo la quantità in modo da avere poi l'elenco ordinato
            $ordiniUniti[$ord] += $quantita[$i];
        }
    }

    //controllo se ordini è empty
    if(empty($ordiniUniti)){
        echo 'no ordini selezionati';
        exit;
    }

}else{
    //controllo se c'è errore nel prendere i dati dal form
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
    <title>riepilogo</title>
</head>
<body>
<!---stampo elenco dati personali-->
    <h2 style="color: red">DATI PERSONALI</h2>
    <h4><strong>User</strong></h4>
    <p><?= $user?></p>
    <h4><strong>Password</strong></h4>
    <p><?= $password?></p>
    <h4><strong>Email</strong></h4>
    <p><?= $email?></p>
<hr>
<!---stampo ordini raggruppati-->
    <h4><strong>ordini</strong></h4>
    <?php foreach ($ordiniUniti as $id=>$quantita) {?>
        <p>[<?= $quantita ?>] <?= $albums[$id] ?></p>
    <?php }?>
</body>
</html>
