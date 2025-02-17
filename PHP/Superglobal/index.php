<?php
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
        <form action="action_page.php" method="get">
            <label for="fname">First name:</label><br>
            <input type="text" id="fname" name="fname" value="luca"><br>
            <label for="lname">Last name:</label><br>
            <input type="text" id="lname" name="lname" value="buts"><br><br>
            <label for="pass">password:</label><br>
            <input type="password" id="pass" name="pass"><br><br>
            <input type="submit" value="Submit">
        </form>
</body>
</html>
