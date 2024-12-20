<?php
//$_POST; //array associativo

//var_dump($_POST);
$name=$_POST['name'];
$password=$_POST['password'];
$comment=$_POST['comment'];
$gender=$_POST['gender'];
$toppings=$_POST['top'];
$car=$_POST['car'];
$carList=$_POST['car-list'];
$cars=$_POST['cars'];
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
    <h2>I tuoi dati</h2>
    <p>name: <?php echo $name?></p>
    <p>password: <?php echo $password?></p>
    <p>comment: <?php echo $comment?></p>
    <p>gender: <?php echo $gender?></p>
    <?php
    foreach ($toppings as $top)
        echo "<p>toppings: ".$top."</p>"
    ?>
    <p>car: <?php echo $car?></p>
    <p>car-list: <?php echo $carList?></p>
    <?php
    foreach ($cars as $car)
        echo "<p>cars: ".$car."</p>"
    ?>

    <p id="demo"></p>
    <script src="script.js"></script>
</body>
</html>