<?php
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
    <h2 style="color: red; text-align: center">PHP Form validation with main controllers</h2>
    <form method="post" action="display.php"> <!--action dice quale è il file che elabora i dati-->
        <label for="name">Enter your name</label>
        <br>
        <input type="text" value="Your name" id="name" name="name">
        <br><br>
        <label for="password">Enter your password</label>
        <br>
        <input  type="password" value="" id="password" name="password">
        <br><br>
        <label for="comment">Enter your comment</label>
        <br>
        <!--text area-->
        <textarea id="comment" row="5" cols="40" name="comment"></textarea>
        <br><br>
        <!--radio button-->
        <label for="gender">Select your gender</label>
        <br><br>
        <input type="radio" id="gender" value="female" name="gender">Female
        <br><br>
        <input type="radio" id="gender" value="male" name="gender">Male
        <br><br>
        <!--check box-->
        <label for="top">Select your topping</label>
        <br>
        <input type="checkbox" id="top" value="pep" name="top[]">Pepperoni
        <br>
        <input type="checkbox" id="top" value="mush" name="top[]">Mushrooms
        <br>
        <input type="checkbox" id="top" value="ol" name="top[]">Olives
        <br><br>
        <!--drop down-->
        <label for="car">Select your car</label>
        <br><br>
        <select id = "car" name="car">
            <option value="volvo">Volvo</option>
            <option value="mazda">Mazda</option>
            <option value="mercedez">Mercedez</option>
            <option value="audi">Audi</option>
        </select>
        <br><br>
        <!--list box single selection-->
        <label for="car-list">Select your car from the list box</label>
        <br><br>
        <select id = "car-list " size="4" name="car-list">
            <option value="volvo">Volvo</option>
            <option value="mazda">Mazda</option>
            <option value="mercedez">Mercedez</option>
            <option value="audi">Audi</option>
        </select>
        <br><br>

        <!--list box single selection-->
        <label for="cars">Select your favourite car from the list box</label>
        <br><br>
        <select id = "cars " size="4" multiple name="cars[]">
            <option value="volvo">Volvo</option>
            <option value="mazda">Mazda</option>
            <option value="mercedez">Mercedez</option>
            <option value="audi">Audi</option>
        </select>
        <br><br>
        <input type="submit" value="Submit"> <!--ci invia il nostro form e gli inoltra in display.php col metodo post in questo caso-->
    </form>
</body>
</html>
