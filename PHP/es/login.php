<?php
session_start();
require 'Config/DbConn.php';    // Adatta il path se serve
$conf = require 'Config/db_conf.php';
$db   = DbConn::getConnection($conf);

// 1) INSERIMENTO DATI DI DEFAULT SE TABELLA CREDENZIALI VUOTA
$queryCheck = "SELECT COUNT(*) as count FROM credenziali;";
try {
    $stmt = $db->prepare($queryCheck);
    $stmt->execute();
    $conta = $stmt->fetch();
    $stmt->closeCursor();
} catch(PDOException $e) {
    echo 'Errore controllo credenziali: ' . $e->getMessage();
    exit;
}

if ($conta && $conta['count'] == 0) {
    // definiamo utenti di default
    $defaults = [
        ['insegnante1', 'insegnanti'],
        ['studente1',   'studenti'],
        ['genitore1',   'genitori'],
        ['personale1',  'personale']
    ];
    $hashPwd = password_hash('prova', PASSWORD_DEFAULT);

    foreach ($defaults as $u) {
        list($username, $table) = $u;

        // 1.a) inserisco in credenziali
        try {
            $qIns = "INSERT INTO credenziali(username, password) VALUES(:username, :password)";
            $i = $db->prepare($qIns);
            $i->bindValue(':username', $username);
            $i->bindValue(':password', $hashPwd);
            $i->execute();
            $i->closeCursor();
        } catch(PDOException $e) {
            echo "Errore creazione credenziali per $username: " . $e->getMessage();
            continue;
        }

        // 1.b) inserisco in persona
        try {
            $qIns = "INSERT INTO persona(username) VALUES(:username)";
            $i = $db->prepare($qIns);
            $i->bindValue(':username', $username);
            $i->execute();
            $idPersona = $db->lastInsertId();
            $i->closeCursor();
        } catch(PDOException $e) {
            echo "Errore creazione persona per $username: " . $e->getMessage();
            continue;
        }

        // 1.c) inserisco nel sottotipo
        try {
            if ($table === 'studenti') {
                // qui presupponiamo che esistano già piano_studio.id=1 e classi.id=1
                $qIns = "INSERT INTO studenti(id, piano_id, classe_id) VALUES(:id, 1, 1)";
            } else {
                $qIns = "INSERT INTO $table(id) VALUES(:id)";
            }
            $i = $db->prepare($qIns);
            $i->bindValue(':id', $idPersona, PDO::PARAM_INT);
            $i->execute();
            $i->closeCursor();
        } catch(PDOException $e) {
            echo "Errore creazione $table per $username: " . $e->getMessage();
            continue;
        }
    }
}

// 2) GESTIONE LOGIN
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($username === '' || $password === '') {
        $error = 'Compila entrambi i campi.';
    } else {
        // verifica credenziali
        $sql = "SELECT c.password, p.id
                FROM credenziali c
                JOIN persona p ON p.username = c.username
                WHERE c.username = :username";
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':username', $username);
        $stmt->execute();
        $row = $stmt->fetch();
        $stmt->closeCursor();

        if ($row && password_verify($password, $row['password'])) {
            // scopro il ruolo
            $sqlR = "
                SELECT CASE
                    WHEN EXISTS(SELECT 1 FROM insegnanti WHERE id = :id) THEN 'insegnante'
                    WHEN EXISTS(SELECT 1 FROM studenti   WHERE id = :id) THEN 'studente'
                    WHEN EXISTS(SELECT 1 FROM genitori   WHERE id = :id) THEN 'genitore'
                    WHEN EXISTS(SELECT 1 FROM personale  WHERE id = :id) THEN 'personale'
                    ELSE 'sconosciuto'
                END AS ruolo";
            $r = $db->prepare($sqlR);
            $r->bindValue(':id', $row['id'], PDO::PARAM_INT);
            $r->execute();
            $ruolo = $r->fetchColumn();
            $r->closeCursor();

            $_SESSION['username'] = $username;
            $_SESSION['ruolo']    = $ruolo;

            switch ($ruolo) {
                case 'insegnante':
                    header('Location: dashboard_insegnante.php');  exit;
                case 'studente':
                    header('Location: dashboard_studente.php');    exit;
                case 'genitore':
                    header('Location: dashboard_genitore.php');    exit;
                case 'personale':
                    header('Location: dashboard_personale.php');   exit;
                default:
                    $error = 'Ruolo non riconosciuto.';
            }
        } else {
            $error = 'Username o password errati.';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Login Registro</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 2em; }
        form { max-width: 300px; margin: auto; }
        .error { color: red; margin-bottom: 1em; }
    </style>
</head>
<body>
<h1>Accedi al Registro</h1>
<?php if ($error): ?>
    <div class="error"><?= $error ?></div>
<?php endif; ?>
<form action="login.php" method="post">
    <label>Username:</label><br>
    <input type="text" name="username" required
           value="<?= ['username'] ?? '' ?>"><br><br>
    <label>Password:</label><br>
    <input type="password" name="password" required><br><br>
    <button type="submit">Accedi</button>
</form>
</body>
</html>
