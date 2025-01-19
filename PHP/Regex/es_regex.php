<?php

// qualunque parola che inizia con info
$pattern1= '#^info#';
$subject1= 'informatica';

if(preg_match($pattern1,$subject1)) {
    echo 'Punto 1 Match' . '<br>';
}else{
        echo 'Punto 1 not Match' . '<br>';
    }

//  parola che termina con atica

$pattern2= '#atica$#';

$subject2= 'informatica';

if(preg_match($pattern2,$subject2)) {
    echo 'Punto 2 Match' . '<br>';
}else{
    echo 'Punto 2 not Match' . '<br>';
}

// qualunque vocaleXYZqualunquenumero_da_0_a_5;

$pattern3= '#[a-zA-Z]XYZ[0-5]*#';

$subject3= 'dXYZ3';

if(preg_match($pattern3,$subject3)) {
    echo 'Punto 3 Match' . '<br>';
}else{
    echo 'Punto 3 not Match' . '<br>';
}

// http (o https)://www.iisviolamarchesini.edu.it/qualunque_parola::qualunque_numero_da_0_a_9

$pattern4= '#(www.iisviolamarchesini.edu.it/)([a-zA-Z0-9]+::)([0-9]+)#';
$subject4= 'www.iisviolamarchesini.edu.it/orarioDocenti::443';

if(preg_match($pattern4,$subject4)) {
    echo 'Punto 4 Match' . '<br>';
}else{
    echo 'Punto 4 not Match' . '<br>';
}

//home/index/qualunque numero.php
$pattern5= '#(home/index/)([0-9]+)#';

$subject5 = 'home/index/1234.php';

if(preg_match($pattern5,$subject5)) {
    echo 'Punto 5 Match' . '<br>';
}else{
    echo 'Punto 5 not Match' . '<br>';
}

// percorso url  qualunque che contenga da due a quattro slash(/). PER: ESEMPIO: home/index/products  oppure scuola/classe/banco/sedia  ....
$pattern6 = '#(/[a-z]+){2,4}#';
$subject6 = 'home/index/products';

if(preg_match($pattern6,$subject6)) {
    echo 'Punto 6 Match' . '<br>';
}else{
    echo 'Punto 6 not Match' . '<br>';
}

/* La regex #localhost(/[A-Za-z]+){2,4}\.php# verifica un URL che:
Inizia con localhost.
Contiene da 2 a 4 cartelle (nomi composti solo da lettere) separate da /.
Termina con .php.*/

