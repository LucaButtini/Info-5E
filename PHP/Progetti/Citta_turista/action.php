<?php
// Controllo se i dati sono stati inviati correttamente
if (!isset($_POST['votes']) || !is_array($_POST['votes'])) { ?>
    <p>Errore nei dati ricevuti. <a href="index.php">Torna al form</a></p>
    <?php exit;
}

// Filtrare i voti ricevuti (rimuove città senza voto)
$votes = array_filter($_POST['votes'], fn($v) => $v !== "");
arsort($votes); // Ordina i voti in ordine decrescente
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Risultati</title>
</head>
<body>

<h1>Risultati dei voti</h1>

<?php if (empty($votes)) { ?>
    <p>Nessun voto inserito.</p>
<?php } else { ?>
    <table>
        <thead>
        <tr>
            <th>Città</th>
            <th>Voto</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($votes as $city => $vote) { ?>
            <tr>
                <td><?= $city ?></td>
                <td><?= $vote ?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
<?php } ?>

<p><a href="index.php">Torna al form</a></p>

</body>
</html>
