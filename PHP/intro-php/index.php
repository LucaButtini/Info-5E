<?php
echo "hello world!";
//definizione variabile, le variabili non sono tipizzate
// debolmente tipizzato (loose typing)
$myvar= "ciao";
echo "<br>";
echo $myvar;
$myvar=2;
echo "<br>";
echo $myvar;

/*istruzioni e dati
integer, double, double with scientific notation -> numeri
boolean -> booleani
string -> stringhe
*/
$count=10;
$list_price=10.5;
$first_name ="Luca";
$is_valid=true;
$microwave = 3.5e-12; //notazione scientifica
echo "<br>";
echo "<br>";
echo PHP_INT_MAX; //devo fare (2^63) -1  perchè il 64 bit è il segno, si dice rappresentazione in complemento a 2.
echo "<br>";
echo PHP_INT_MIN;// 2^63
const PIGRECO = 3.141516; //costante
echo "<br>";
echo PIGRECO;
echo "<br>";
echo "<br>";
$a=0;
$b='0';

// questa uguaglianza fa un cast, prende la stringa e la mette intero (va a vedere il contenuto)
if($a==$b)
    echo "sono uguali";
else
    echo "sono diversi";
echo "<br>";

//operatore di identità
if($a===$b)
    echo "sono uguali";
else
    echo "sono diversi";

echo "<br>";

if(null === 0)
    echo "sono uguali";
else
    echo "sono diversi";

echo "<br>";

// se una variabile è null è considerata non settata
if(isset($second_var))
    echo "dichiarata";
else
    echo "non dichiarata";

echo "<br>";

$second_var=null;
if(is_null($second_var))
    echo "null";
else
    echo "is not null";

echo "<br>";
$var3=5;
// se non è dichiarata è EMPTY
if(empty($var3))
    echo "is empty";
else
    echo "not empty";
echo "<br>";

/*statements
iterazioni -> while, do while, for loops, break and continue
selezione -> if, if else, switch, match, coalescing, spaceship
*/
echo "<br>";
// match
$grade = "J";
$messagge= match($grade) {

    'A' => "letter A",
    'B' => "letter B",
    'C' => "letter C",
    default => "altre"
};
echo $messagge;

$subtotal = 250;
$total =0;
$total = match(true){
    $subtotal<=200 => $total= $subtotal*0.9,
    $subtotal> 200 => $total= $subtotal*0.8
};
echo "<br>";
echo $total;

// conditional operator
$num1= 100;
$num2=200;

$num1>$num2 ? $r='ok' : $r="ko";
echo "<br>";
echo $r.'<br>';

//coalescing operator
$numo=0;
$num3= $numo ?? $num2;
echo $num3.'<br>';

//spaceship da -1 0 o 1 in base se sono minori uguali o maggiori
echo "<br>";
echo $num1<=> $num2;

//stringhe
$language = 'PHP';
$messagge='welcome to $language';
echo "<br>";
echo $messagge.'<br>';

$message= "welcome to $language"; //interpolazione
echo $message.'<br>';

$count=12;
$item='flower';
$mess3="you have $count ${item}";
echo $mess3;
