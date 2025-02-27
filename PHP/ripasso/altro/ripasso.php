<?php

$arr=[
    'a'=> 5,
    'b'=> 10,
    'c'=> 20
];

print_r($arr);
echo '<br>';

$key= array_search(10, $arr);

echo 'Valore 40 =>'.$key.'<br>';