<?php
//include 'firstDir\ClasseUno.php';
//include 'firstDir\f_firstDir\ClasseUnoUno.php';
//include 'secondDir\ClasseDue.php';


//usiamo una funzione che va a cercare la classe in automatico

//accetta una funzione
spl_autoload_register(function($class){
    include $class.'.php';
});


use firstDir\ClasseUno;
use firstDir\f_firstDir\ClasseUnoUno;
use secondDir\ClasseDue;

$c1= new ClasseUno();
$c2= new ClasseDue();
$c1_1= new ClasseUnoUno();

$c1->saluta();
echo '<br>';
echo '<br>';
$c2->saluta();
echo '<br>';
echo '<br>';
$c1_1->saluta();
echo '<br>';
echo '<br>';
