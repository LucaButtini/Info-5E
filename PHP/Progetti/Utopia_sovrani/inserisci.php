<?php
$title = 'Inserisci Sovrani';
require 'header.php';

spl_autoload_register(function ($class) {
    include $class . '.php';
});

use Config\DbConnection;

$conf = require './Config/DBconfig.php';
$db = DbConnection::getDb($conf);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recupero dati dal form
    $nome = $_POST['nome'];
    $inizio_regno = $_POST['data-inizio'];
    $fine_regno = !empty($_POST['data-fine']) ? $_POST['data-fine'] : null;
    $immagine = $_POST['immagine'];

    // Controllo se i valori sono stati forniti
    $predecessore_nome = !empty($_POST['predecessore_nome']) ? $_POST['predecessore_nome'] : null;
    $successore_nome = !empty($_POST['successore_nome']) ? $_POST['successore_nome'] : null;

    try {
        // Funzione per verificare se un sovrano esiste
        function sovranoEsiste($db, $nome) {
            $stmt = $db->prepare("SELECT nome FROM sovrani WHERE nome = :nome");
            $stmt->bindValue(':nome', $nome, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result !== false;
        }



        // Inserimento del sovrano con gestione dei valori NULL
        $query = "INSERT INTO sovrani (nome, inizio_regno, fine_regno, immagine, predecessore_nome, successore_nome) 
                  VALUES (:nome, :inizio_regno, :fine_regno, :immagine, :predecessore_nome, :successore_nome)";
        $stmt = $db->prepare($query);
        $stmt->bindValue(':nome', $nome, PDO::PARAM_STR);
        $stmt->bindValue(':inizio_regno', $inizio_regno, PDO::PARAM_STR);
        $stmt->bindValue(':fine_regno', $fine_regno !== null ? PDO::PARAM_STR : PDO::PARAM_NULL);
        $stmt->bindValue(':immagine', $immagine, PDO::PARAM_STR);
        $stmt->bindValue(':predecessore_nome', $predecessore_nome !== null ? $predecessore_nome : null, PDO::PARAM_STR);
        $stmt->bindValue(':successore_nome', $successore_nome !== null ? $successore_nome : null, PDO::PARAM_STR);
        $stmt->execute();

        header('Location: confirm.html'); // Pagina di conferma
        // Debug: stampo i dati prima di eseguire la query
        echo "<pre>";
        echo "Nome: $nome\n";
        echo "Inizio Regno: $inizio_regno\n";
        echo "Fine Regno: " . ($fine_regno ?: 'NULL') . "\n";
        echo "Immagine: $immagine\n";
        echo "Predecessore: " . ($predecessore_nome ?: 'NULL') . "\n";
        echo "Successore: " . ($successore_nome ?: 'NULL') . "\n";
        echo "</pre>";
        exit(); // Blocca il codice per vedere i dati prima dell'inserimento
    } catch (PDOException $e) {
        header('Location: error.html'); // Pagina di errore
        exit();
    }
}

?>




<div class="container mt-5 rounded-4 p-5 bg-body-tertiary">
    <div class="text-center p-3">
        <h2 class="text-danger"><strong>Inserisci un Sovrano:</strong></h2>
    </div>
    <form action="inserisci.php" method="post">
        <div class="mb-3">
            <label for="nome">Nome:</label>
            <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" required>
        </div>
        <div class="mb-3">
            <label for="data-inizio">Data Inizio Regno:</label>
            <input type="date" class="form-control" id="data-inizio" name="data-inizio" required>
        </div>
        <div class="mb-3">
            <label for="data-fine">Data Fine Regno:</label>
            <input type="date" class="form-control" id="data-fine" name="data-fine">
        </div>
        <div class="mb-3">
            <label for="immagine">Immagine (URL):</label>
            <input type="text" class="form-control" id="immagine" name="immagine" placeholder="URL immagine" required>
        </div>
        <div class="mb-3">
            <label for="predecessore_nome">Nome Predecessore:</label>
            <input type="text" class="form-control" id="predecessore_nome" name="predecessore_nome">
        </div>
        <div class="mb-3">
            <label for="successore_nome">Nome Successore:</label>
            <input type="text" class="form-control" id="successore_nome" name="successore_nome">
        </div>
        <button type="submit" class="btn btn-primary"><i class="bi bi-plus-circle"></i> Aggiungi Sovrano</button>
    </form>
</div>

<?php
require 'footer.php';
?>
