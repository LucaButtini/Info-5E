<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Controlla se il tempo di inizio della sessione è impostato e se sono trascorsi più di 60 secondi

$votes = $_POST['votes'];

arsort($votes); // ordine decresente voti
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Risultati</title>
</head>
<body>

<h1>Risultati dei voti</h1>
<?php if (!isset($_SESSION['start_time']) || (time() - $_SESSION['start_time'] > 60)) {
session_unset();
session_destroy();
?>
    <h2>Sessione scaduta</h2>
    <p>tempo scaduto.</p>
    <p><a href="index.php">Ricarica la pagina per iniziare di nuovo</a></p>
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
    <p><a href="index.php">Torna al form</a></p>
<?php } ?>



</body>
</html>
