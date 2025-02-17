<?php
require './Config/DBConn.php';

spl_autoload_register(function($class){
    include $class.'.php';
});
use Config\DBConn;


$conf = require './Config/dbconf.php';

$db= DBConn::getConn($conf);


$query = "select * from studenti;";

try {
    $stmt = $db->prepare($query);
    $stmt->execute();

    while ($stud = $stmt->fetch()) {
        echo 'matricola:' . $stud->matricola_studente.'<br>';
        echo 'nome:' . $stud->nome.'<br>';
        echo 'cognome:' . $stud->cognome.'<br>';
        echo 'data iscrizione:' . $stud->data_iscrizione.'<br>';
        echo 'media:' . $stud->media.'<br><br>';
        echo '<hr>';
    }
    $stmt->closeCursor();
}catch (PDOException $e){
    echo $e->getMessage();
}

/*$query= "insert into studenti(matricola_studente, nome, cognome, data_iscrizione, media) values (:matricola_studente, :nome, :cognome, :data_iscrizione, :media)";
try{
    $stmt = $db->prepare($query);
    $stmt->bindValue(':matricola_studente', '56');
    $stmt->bindValue(':nome', 'leo');
    $stmt->bindValue(':cognome', 'gaba');
    $stmt->bindValue(':data_iscrizione', '2018-10-10');
    $stmt->bindValue(':media', '5');
    if($stmt->execute()){
        $stmt->closeCursor();
    }else{
        throw new PDOException('Errore nella query');
    }
    $stmt->closeCursor();
}catch (PDOException $e){
    echo $e->getMessage();
}*/





