<?php
// Avvia la sessione se non è già avviata
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Controlla se il tempo di inizio della sessione è impostato e se sono trascorsi più di 60 secondi
if (!isset($_SESSION['start_time']) || (time() - $_SESSION['start_time'] > 60)) {
    session_unset();
    session_destroy();
    ?>
    <!doctype html>
    <html lang="it">
    <head>
        <meta charset="UTF-8">
        <title>Sessione Scaduta</title>
    </head>
    <body>
    <h2>Sessione scaduta</h2>
    <p>Il tempo per l'inserimento dei dati è scaduto.</p>
    <p><a href="index.php">Ricarica la pagina per iniziare di nuovo</a></p>
    </body>
    </html>
    <?php
    exit;
}

// Se i dati non sono stati inviati correttamente, mostra un messaggio di errore
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
