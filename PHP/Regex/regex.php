<?php

$pattern = '#abc#';
$subject = 'ciao';

$subject = 'ciabco';

$pattern= '#^abc#'; //guardo se inizia così la stringa
$subject = 'abcofgh';
$subject = 'ciao abc'; //abc non è all'inizio (lo spazio è un carattere)

$pattern= '#abc$#'; //alla fine della stringa
$subject = 'ciaoo abc';//ora lo trova

$pattern= '#a[123]b#'; //cerco un carattere fra dei caratteri che ho messo

$subject = 'a2b';

$pattern= '#a[123]+b#'; //col + sono infiniti (almeno uno da mettere)

$subject = 'a221212121212121212121212121b';

$pattern= '#a[123]*b#'; //col * anche se non ci sono (se è zero va lo stesso)

$subject = 'ab';

$pattern= '#a[0-9]*b#'; //qualsiasi numero da 0 a 9

$subject = 'a5b';

$subject= '4kjkkjkjkjkjkkjkjk5';

$pattern= '#4[a-zA-Z]*5#'; // con le lettere

$subject= 'home/index/product';

$pattern= '#home/index/[a-zA-Z]+#'; //però così mi guarda la prima lettera, quindi non differenzia parole diverse con la stessa lettera per esempio

$pattern = '#(/[a-z]+){1,5}#'; //con le tonde intendo un gruppo e le fa fino a 5 volte

$subject = '/home/index/temp/itis/venerdi';
$subject = '/gaba/grafici/temp/itis';



if(preg_match($pattern, $subject, $matches)) {
    echo 'Match' . '<br>';
    $result = explode("/", $matches[0]);
    echo count($result);
    var_dump($result);
    //var_dump($matches);
} else{
        echo 'no match';
    }
