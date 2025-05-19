<?php
$pdo = new PDO("mysql:host=localhost;dbname=sqli2", "root", "");
$username = $_GET['username'] ?? '';
$content=[];

//$query = "SELECT * FROM Users WHERE username = :username";
//sql injection è un effetto collaterale di sql. Ecco perchè si mette bindValue
$query = "SELECT * FROM Users WHERE username = '$username'";
$stmt = $pdo->prepare($query);
//$stmt->bindValue(':username', $username);//così evitiamo sql injection
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
 <p><?= $row['username']?></p>
 <p><?= $row['password']?></p>
    <hr>
<?php }?>
</body>
</html>
