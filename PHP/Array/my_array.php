<?php
// echo phpinfo(); // da informazioni sulle configurazioni php

$names=[
    'Bob',
    'Lucy',
    'Cri',
];

echo $names[0];
echo "<br>";
echo "<br>";

$names[]= 'Anthony';
for($i=0; $i<count($names); $i++){
    echo $names[$i].'<br>';
}
echo "<br>";
echo "<br>";

// var dump si usa per il dubbing del codice
var_dump($names);
echo "<br>";
echo "<br>";
var_dump($names);
echo "<br>";
echo "<br>";
unset($names[1]); // tira via l'elemento ma non reindicizza,rimane un buco nell'array
for($i=0; $i<count($names); $i++){ //il count lascia fuori l'ultimo elemento
    if(isset($names[$i]))
        echo $names[$i].'<br>';
}
echo "<br>";
echo "<br>";
foreach($names as $name) //col foreach non ho il problema del count
    echo $name.'<br>';
echo "<br>";
echo "<br>";

//in questa maniera elimino il gap dell'unset, e usando il for si vede come il foreach.
$names = array_values($names);
for($i=0; $i<count($names); $i++){
        echo $names[$i].'<br>';
}
echo "<br>";
echo "<br>";
echo "<br>";

//array associativi
//con gli array associativi ho coppie key values in cui la chiave è solitamente una stringa e poi un valore associato alla chiave

$students=[
  'Katty' => 8,
  'Cri' => 5,
  'Lucy'=> 9,
];

echo $students['Katty'];
echo "<br>";
echo "<br>";

foreach ($students as $key=>$value)
    echo $key.' - '.$value.'<br>';




