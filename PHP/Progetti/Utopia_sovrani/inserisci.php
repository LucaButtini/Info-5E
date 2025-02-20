<?php
$title = 'Inserisci Sovrani';
require 'header.php';

spl_autoload_register(function ($class) {
    include $class . '.php';
});

use Config\DbConnection;

$conf = require './Config/DBconfig.php';
$db = DbConnection::getDb($conf);

// Controlla se il form è stato inviato
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recupero dati dal form (usando i nomi dei campi attuali)
    $nome = $_POST['nome'];
    $inizio_regno = $_POST['data-inizio'];
    $fine_regno = !empty($_POST['data-fine']) ? $_POST['data-fine'] : null;
    $immagine = $_POST['immagine'];

    // Inizializziamo i campi per successore e predecessore
    $nome_successore = null;
    $nome_predecessore = null;

    try {
        // Verifica se ci sono già sovrani nel database
        $queryCheck = 'SELECT COUNT(*) AS QUANTITA FROM sovrani';
        $stm = $db->prepare($queryCheck);
        $stm->execute();
        $quantita = $stm->fetch(PDO::FETCH_OBJ);
        $stm->closeCursor();

        if ($quantita->QUANTITA > 0) {
            // Se ci sono sovrani, il predecessore sarà l'ultimo inserito che non ha successore
            $query = 'SELECT nome FROM sovrani WHERE successore_nome IS NULL';
            $stm = $db->prepare($query);
            $stm->execute();
            $lastSovereign = $stm->fetch(PDO::FETCH_OBJ);
            $stm->closeCursor();

            if ($lastSovereign) {
                $nome_predecessore = $lastSovereign->nome;
            }
        }
        // Altrimenti, se non ci sono sovrani, il predecessore resta null

        // Inserisci il nuovo sovrano
        $query = "INSERT INTO sovrani (nome, inizio_regno, fine_regno, immagine, predecessore_nome, successore_nome) 
                  VALUES (:nome, :inizio_regno, :fine_regno, :immagine, :nome_predecessore, :nome_successore)";
        $stmt = $db->prepare($query);
        $stmt->bindValue(':nome', $nome, PDO::PARAM_STR);
        $stmt->bindValue(':inizio_regno', $inizio_regno, PDO::PARAM_STR);
        $stmt->bindValue(':fine_regno', $fine_regno, PDO::PARAM_STR);
        $stmt->bindValue(':immagine', $immagine, PDO::PARAM_STR);
        $stmt->bindValue(':nome_predecessore', $nome_predecessore, $nome_predecessore === null ? PDO::PARAM_NULL : PDO::PARAM_STR);
        $stmt->bindValue(':nome_successore', $nome_successore, PDO::PARAM_NULL);
        $stmt->execute();

        // Se esiste un predecessore, aggiorna il suo successore con il nuovo sovrano
        if ($nome_predecessore) {
            $updateQuery = "UPDATE sovrani SET successore_nome = :nome_successore WHERE nome = :nome_predecessore";
            $updateStmt = $db->prepare($updateQuery);
            $updateStmt->bindValue(':nome_successore', $nome, PDO::PARAM_STR);
            $updateStmt->bindValue(':nome_predecessore', $nome_predecessore, PDO::PARAM_STR);
            $updateStmt->execute();
        }

        header('Location: confirm.html');
        exit();
    } catch (PDOException $e) {
        logError($e);
        header('Location: error.html');
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
            <input type="text" class="form-control" id="predecessore_nome" name="predecessore_nome" placeholder="Lascia vuoto se non conosci il predecessore">
        </div>
        <div class="mb-3">
            <label for="successore_nome">Nome Successore:</label>
            <input type="text" class="form-control" id="successore_nome" name="successore_nome" placeholder="Lascia vuoto se non conosci il successore">
        </div>
        <button type="submit" class="btn btn-primary"><i class="bi bi-plus-circle"></i> Aggiungi Sovrano</button>
    </form>
</div>

<?php
require 'footer.php';
?>
