<?php
session_start();
require 'Config/DbConn.php';
$conf = require 'Config/db_conf.php';
$db   = DbConn::getConnection($conf);

// Verifica sessione e ruolo
if (!isset($_SESSION['username']) || $_SESSION['ruolo'] !== 'insegnante') {
    header('Location: login.php');
    exit;
}

// Prendo l'id dell'insegnante
$stmt = $db->prepare("
  SELECT p.id
  FROM persona p
  WHERE p.username = :u
");
$stmt->execute([':u' => $_SESSION['username']]);
$insegnanteId = $stmt->fetchColumn();

// Recupero classi e materie associate
$stmt = $db->prepare("
  SELECT cl.nome AS classe, m.nome AS materia
  FROM classi_docenti_materia cdm
  JOIN classi cl   ON cl.id = cdm.classe_id
  JOIN materie m   ON m.id  = cdm.materia_id
  WHERE cdm.docente_id = :did
");
$stmt->execute([':did' => $insegnanteId]);
$associazioni = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Insegnante</title>
</head>
<body>
<h1>Benvenuto, <?= $_SESSION['username'] ?>!</h1>
<h2>Sei un Insegnante</h2>

<h3>Classi e materie che insegni:</h3>
<?php if (count($associazioni) === 0): ?>
    <p>Non sei assegnato a nessuna classe o materia.</p>
<?php else: ?>
    <ul>
        <?php foreach ($associazioni as $a): ?>
            <li>
                Classe: <?= $a['classe'] ?> — Materia: <?= $a['materia'] ?>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<p><a href="logout.php">Esci</a></p>
</body>
</html>
