<?php
session_start();
require 'Config/DbConn.php';
$conf = require 'Config/db_conf.php';
$db   = DbConn::getConnection($conf);

// Verifica sessione e ruolo
if (!isset($_SESSION['username']) || $_SESSION['ruolo'] !== 'genitore') {
    header('Location: login.php');
    exit;
}

// Prendo l'id del genitore
$stmt = $db->prepare("
  SELECT p.id
  FROM persona p
  WHERE p.username = :u
");
$stmt->execute([':u' => $_SESSION['username']]);
$genitoreId = $stmt->fetchColumn();

// Recupero gli studenti associati e la loro classe
$stmt = $db->prepare("
  SELECT stud.username AS studente, cl.nome AS classe
  FROM genitori_studenti gs
  JOIN studenti st ON st.id = gs.studente_id
  JOIN persona stud ON stud.id = st.id
  JOIN classi cl  ON cl.id = st.classe_id
  WHERE gs.genitore_id = :gid
");
$stmt->execute([':gid' => $genitoreId]);
$figli = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Genitore</title>
</head>
<body>
<h1>Benvenuto, <?= $_SESSION['username'] ?>!</h1>
<h2>Sei un Genitore</h2>

<h3>I tuoi figli:</h3>
<?php if (count($figli) === 0): ?>
    <p>Non hai figli associati.</p>
<?php else: ?>
    <ul>
        <?php foreach ($figli as $f): ?>
            <li>
                <?= $f['studente'] ?>
                — Classe: <?= $f['classe'] ?>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<p><a href="logout.php">Esci</a></p>
</body>
</html>
