<?php
//declare(strict_types=1); //per fare si che diventi più tipizzato, controlla i tipi correttamente ora

//notiamo che è poco tipizzato
echo 'Functions in php'.'<br><br>';
function average($a, $b, $c){
    return ($a+$b+$c)/3;
}

echo average(10, 20, 30).'<br>';

//stessa funz con modo diverso modo
//ora c'è la possibilità di introdurre il tipo

function average2(int $a, int $b, int $c):int{
    return ($a+$b+$c)/3;
}

echo average2(10, 20, 30).'<br>';


// ora controlliamo il tipo, possiamo fare che inseriamo tipi di dati che possono essere di tipi o altri

function average3(float|int $a, float|int $b, float|int $c=30):float|int{ // si dice union type
    return ($a+$b+$c)/3;
}

echo average3(10.5, 20.5, 30.5).'<br>';

//c'è la possibilità di mettere un valore di default nella firma, partendo dalla fine, se non rispettiamo la funzione
echo average3(10.5, 20).'<br>';

function average4(?int $a, float|int $b, float|int $c=30):float|int|string{
    if($a<0 || $b<0 || $c<0)
        return 'non posso calcolare la media';
    return ($a+$b+$c)/3;
}
// il ? davanti al tipo,ma senza le union type nel punto in cui lo metto
echo average4(null, -20, 30.5).'<br><br>';


// come sono passati gli argomenti
$a=1;
$b=2;
$c=3;

function average5($a, $b, $c){ //arg by value
    $a*=10;
    $b*=20;
    $c*=30;
    return ($a+$b+$c)/3;
}

echo average5($a, $b, $c).'<br><br>';
echo $a.' '.$b.' '.$c.'<br><br>';

function average6(&$a, &$b, &$c){ //arg by reference
    $a*=10;
    $b*=20;
    $c*=30;
    return ($a+$b+$c)/3;
}

echo average6($a, $b, $c).'<br>';
echo $a.' '.$b.' '.$c.'<br><br>';

$numbers=[1,2,3,4,5];

function averageArray($numbers):void{ //array by value
    for($i=0; $i<count($numbers); $i++){
        $numbers[$i]*=10;
    }
}


averageArray($numbers);
foreach($numbers as $number){
    echo $number.'<br>';
}

echo '<br>';
function averageArray2(&$numbers):void{
    for($i=0; $i<count($numbers); $i++){
        $numbers[$i]*=10;
    }
}

// anche i vettori sono passati per value
averageArray2($numbers);
foreach($numbers as $number){
    echo $number.'<br>';
}

echo '<br>';

//le var fuori dalla funzione, non è vista dentro la funzione
$myvar=55;
function printValue(){
    global $myvar;
    echo $myvar.'<br>';
}

printValue(); //chiamo la funzione

echo '<br><br>';
echo 'Variadic Function'.'<br><br>';
//variadic function

function average7(...$nums):float{
    $sum=0;
    for($i=0; $i<count($nums); $i++){
        $sum+=$nums[$i];
    }
    return $sum/count($nums);
}

echo average7(10, 20, 30).'<br>';
echo average7(10, 20, 30, 40).'<br>';
echo average7(10, 20, 30, 40, 50).'<br>';

//variable function
echo '<br><br>';
echo 'Variable Function'.'<br><br>';

function sum($a, $b){
    return $a+$b;
}

function mul($a, $b):int{
    return $a*$b;
}

$randomNum = mt_rand(0,1);
if($randomNum==1)
    $functionVar= 'sum';
else
    $functionVar='mul';

//associo ad una variabile il nome della funzione
$result=$functionVar(10,20);
echo 'risultato variabile: '.$result.'<br><br>';

//faccio una funzione filtro

// il quarto parametro è una variabile che contiene una funzione
function filter($min, $a, $b, $func): string{//callback
    if($func($a, $b)<$min)
        return 'nessun valore rilevante';
    else
        return 'valore: '.$func($a, $b);
}

echo filter(5, 10, 20,$functionVar).'<br>';

echo '<br><br>';
echo 'array map'.'<br><br>';
$numbers=[1,2,3,4,5,6];

function myElab($element){
    return $element*$element;
}


$varmyElab= 'myElab';

$arrayRes=array_map($varmyElab, $numbers);
var_dump($arrayRes);
echo '<br>';

$arrayRes2=array_map(function($element){
    return $element*$element;
}, $numbers);
var_dump($arrayRes2);






