<?php
$albums=require_once 'albums.php';

if($_SERVER['REQUEST_METHOD']=='POST'){
$user=$_POST['user']??null;
$password=$_POST['password']??null;
$email=$_POST['email']??null;
$ordini = $_POST['album'] ?? [];
$quantita=$_POST['quantita']??[];

if(empty($user) || empty($password) || empty($email)){
    echo 'devi inserire tutti i dati';
    exit;
}

$ordiniUniti=[];

foreach($ordini as $i=>$ord){
    if($quantita[$i] != 0){
        if(!isset($ordiniUniti[$ord])){
            $ordiniUniti[$ord]=0;
        }
        $ordiniUniti[$ord] += $quantita[$i];
    }
}

if(empty($ordiniUniti)){
    echo 'no ordini selezionati';
    exit;
}

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
    <title>riepilogo</title>
</head>
<body>
    <h2 style="color: red">DATI PERSONALI</h2>
    <h4><strong>User</strong></h4>
    <p><?= $user?></p>
    <h4><strong>Password</strong></h4>
    <p><?= $password?></p>
    <h4><strong>Email</strong></h4>
    <p><?= $email?></p>
<hr>
    <h4><strong>ordini</strong></h4>
    <?php foreach ($ordiniUniti as $id=>$quantita) {?>
        <p>[<?= $quantita ?>] <?= $albums[$id] ?></p>
    <?php }?>
</body>
</html>
