<?php
//$content= 'dati provenienti dal database';

$db= new PDO('mysql:host=localhost;dbname=itis', 'root', '', [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_OBJ]);

$query= 'select * from itis.studenti';

try{
    $stm= $db->prepare($query);
    $stm->execute();
    //output buffer
    //tutti gli echo che ora faccio per la select finiscono nel buffer, non nel browser
    ob_start();
    while($studente= $stm->fetch()){ //raccoglie una tupla alla volta finchè non ha finito
        //decido io come trattare la tupla, ovvero come un oggetto
        echo "Matricola Studente ".$studente->matricola_studente.'<br>';
        echo "Nome ".$studente->nome.'<br>';
        echo "Cognome ".$studente->cognome.'<br>';
        echo "Media ".$studente->media.'<br>';
        echo "Data Iscrizione ".$studente->data_iscrizione.'<br>';
        echo '<hr>';
    }
    $content= ob_get_contents();
    ob_end_clean();

    $stm->closeCursor();
}catch (Exception $e){
    logError($e);
}

require 'header.php';
?>
<div>
    <p>Buongiorno</p>
    <p><?=/**@var $content */$content?></p>

</div>
<?php
require 'footer.php';
?>
