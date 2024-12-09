<?php
// percorso directory corrente
echo getcwd();
echo '<br>';
echo DIRECTORY_SEPARATOR;
echo '<br>';
//vediamo se esiste un file
$path= getcwd();
echo is_file($path.DIRECTORY_SEPARATOR.'prova.txt') ? 'trovato' : 'non trovato';
echo '<br>';
echo is_dir($path.DIRECTORY_SEPARATOR.'myDir') ? 'trovata' : 'non trovata';
echo '<br>';
$items= scandir($path.DIRECTORY_SEPARATOR.'mydir');
echo '<h1>Files in myDir</h1>';
echo '<ul>';
foreach ($items as $item) {
    if(str_starts_with($item, 'f')) // così togliamo i file '.' e '..'
        echo '<li>'.$item.'</li>';
}
echo '</ul>';
echo '<br>';
// così non riconosce gli a capo
$text= file_get_contents($path.DIRECTORY_SEPARATOR.'prova.txt');
echo '<div>'.$text.'</div>';
echo '<br>';
// riconosce gli a capo
$rows= file($path.DIRECTORY_SEPARATOR.'prova.txt');
foreach ($rows as $row){
    echo '<div>'.$row.'</div>';
}
echo '<br>';
// mi sovrascrive non avendo messo FILE_APPEND
$text='Ciao, puoi usare il codice shein di mia cugina?';
file_put_contents($path.DIRECTORY_SEPARATOR.'prova.txt', $text);
echo '<br>';
$subjects=['Informatica', 'tpsit', 'sistemi e reti'];
$names= implode("\n", $subjects);
$rows= file_put_contents($path.DIRECTORY_SEPARATOR.'prova.txt', $names, FILE_APPEND);
echo '<br>';
echo '<br>';
