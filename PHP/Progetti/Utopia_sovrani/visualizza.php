<?php
$title = 'Elenco Sovrani';
require 'header.php';

spl_autoload_register(function ($class) {
    include $class . '.php';
});


use Config\DbConnection;

$conf = require './Config/DBconfig.php';
$db = DbConnection::getDb($conf);

// Query per recuperare tutti i sovrani
$query = "SELECT * FROM sovrani";
$stmt = $db->prepare($query);
$stmt->execute();
$sovrani = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container mt-5">
    <div class="text-center p-3">
        <h2 class="text-primary"><strong>Elenco dei Sovrani</strong></h2>
    </div>

    <table class="table table-striped table-bordered">
        <thead class="table-dark">
        <tr>
            <th>Immagine (url)</th>
            <th>Nome</th>
            <th>Inizio Regno</th>
            <th>Fine Regno</th>
            <th>Predecessore</th>
            <th>Successore</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($sovrani as $sovrano): ?>
            <tr>
                <td><?= $sovrano['immagine'] ?></td>
                <td><?= $sovrano['nome'] ?></td>
                <td><?= $sovrano['inizio_regno'] ?></td>
                <td><?= $sovrano['fine_regno'] ? $sovrano['fine_regno'] : 'In corso' ?></td>
                <td><?= $sovrano['predecessore_nome'] ? $sovrano['predecessore_nome'] : 'Nessuno' ?></td>
                <td><?= $sovrano['successore_nome'] ? $sovrano['successore_nome'] : 'Nessuno' ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php
require 'footer.php';
?>
