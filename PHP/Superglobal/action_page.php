<?php

//variabile superglobal. Definita da php disponibile in tutti gli script

$fname= $_GET['fname'];
$lname= $_GET['lname'];

/*$fname= $_POST['fname'];
$lname= $_POST['lname'];*/

/*quando uso get tiro giù dati dal server e quando devo comunicare uso post.
Il get ha la query string, che manda in chiaro e si vedono nell'url del server

*/
echo $fname.'<br>';
echo $lname;