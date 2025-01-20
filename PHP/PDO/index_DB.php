<?php

// dsn data source name
// la configurazione è data tramite array associativo
$db= new PDO('mysql:host=localhost;dbname=itis', 'root', '', [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_OBJ]);

//var_dump($db);

//echo $db->getAttribute(PDO::ATTR_DRIVER_NAME);

$query= 'select * from itis.studenti';

//read

try{
    $stm= $db->prepare($query);
    $stm->execute();
    while($studente= $stm->fetch()){ //raccoglie una tupla alla volta finchè non ha finito
        //decido io come trattare la tupla, ovvero come un oggetto
        echo "Matricola Studente ".$studente->matricola_studente.'<br>';
        echo "Nome ".$studente->nome.'<br>';
        echo "Cognome ".$studente->cognome.'<br>';
        echo "Media ".$studente->media.'<br>';
        echo "Data Iscrizione ".$studente->data_iscrizione.'<br>';
        echo '<hr>';
    }
    $stm->closeCursor();
}catch (Exception $e){
    logError($e);
}



/*$query = 'select media, cognome from itis.studenti where nome = :name';

try {
    $stm = $db->prepare($query);
    $stm->bindValue(':name', 'Antonella'); // legare il parametro correttamente
    $stm->execute(); // eseguire la query dopo aver legato i parametri
    while ($studente = $stm->fetch()) {
        echo "Cognome " . $studente->cognome . '<br>';
        echo "Media " . $studente->media . '<br>';
        echo '<hr>';
    }
    $stm->closeCursor();
} catch (Exception $e) {
    logError($e);
}*/


//create

/*
 *  $query='INSERT INTO itis.studenti (matricola_studente,nome,cognome,data_iscrizione,media) VALUES(:matricola_studente, :nome, :cognome, now(), :media)';
 * try{
    $stm = $db->prepare($query);
    $stm->bindValue(':matricola_studente', '00015');
    $stm->bindValue(':nome', 'Lucy');
    $stm->bindValue(':cognome', 'Taylor');
    $stm->bindValue(':media', 8);
    if($stm->execute()){
        $stm->closeCursor();
    }else{
        throw new PDOException('Errore nella query');
    }
}catch (Exception $e){
    logError($e);
}*/



//update

$query='update studenti set media=:media where nome=:nome';
try{
    $stm = $db->prepare($query);
    $stm->bindValue(':nome', 'Lucy');
    $stm->bindValue(':media', 3);
    if($stm->execute()){
        $stm->closeCursor();
    }else{
        throw new PDOException('Errore nella query');
    }
}catch (Exception $e){
    logError($e);
}


//funzione per il log degli errori
function logError(Exception $e){
    error_log($e->getMessage().'---'.date('Y-m-d H:i:s'."\n"), 3,'log/database_log');
    echo 'An error with the DB has occured'.'<br>';
}