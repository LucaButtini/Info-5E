<?php
// Impostiamo il lifetime della sessione a 10 secondi per il test
if (session_status() == PHP_SESSION_NONE) {
    session_set_cookie_params([
        'lifetime' => 10, // Impostiamo il lifetime a 10 secondi
        'path' => '/',
        'domain' => '',
        'secure' => false,
        'httponly' => false
    ]);
    session_start();
}

// Impostiamo un orario di inizio se non esiste già
if (!isset($_SESSION['start_time'])) {
    $_SESSION['start_time'] = time();
}

// Se sono passati più di 10 secondi dalla sessione di inizio, la sessione è scaduta
if (time() - $_SESSION['start_time'] > 10) {
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

// Aggiorna il tempo ogni volta che la pagina viene ricaricata
$_SESSION['start_time'] = time();
?>

<!doctype html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Valuta le città</title>
</head>
<body>

<h1>Le città del turista</h1>
<p>Inserisci i voti per le città che hai visitato (da 1 a 5).</p>

<form action="action.php" method="post">
    <?php
    $citta = require_once 'cities.php';
    foreach ($citta as $city) { ?>
        <div>
            <label for="<?= $city ?>"><?= $city ?></label><br>
            <input type="number" name="votes[<?= $city ?>]" id="<?= $city ?>" min="1" max="5" step="1" value="1">
            <br>
        </div>
    <?php } ?>

    <button type="submit">Invia voti</button>
</form>

</body>
</html>
