<?php
session_start();
require 'Config/DbConn.php';
$conf = require 'Config/db_conf.php';
$db   = DbConn::getConnection($conf);

// Verifica sessione e ruolo
if (!isset($_SESSION['username']) || $_SESSION['ruolo'] !== 'studente') {
    header('Location: login.php');
    exit;
}

// Prendo l'id dello studente
$stmt = $db->prepare("
  SELECT p.id, st.piano_id, st.classe_id
  FROM persona p
  JOIN studenti st ON st.id = p.id
  WHERE p.username = :u
");
$stmt->execute([':u' => $_SESSION['username']]);
$stud = $stmt->fetch();
$studId   = $stud['id'];
$pianoId  = $stud['piano_id'];
$classeId = $stud['classe_id'];

// Recupero i genitori
$stmt = $db->prepare("
  SELECT par.username AS genitore
  FROM genitori_studenti gs
  JOIN persona par ON par.id = gs.genitore_id
  WHERE gs.studente_id = :sid
");
$stmt->execute([':sid' => $studId]);
$genitori = $stmt->fetchAll();

// Recupero la classe
$stmt = $db->prepare("
  SELECT nome
  FROM classi
  WHERE id = :cid
");
$stmt->execute([':cid' => $classeId]);
$classe = $stmt->fetchColumn();

// Recupero le materie del piano di studio
$stmt = $db->prepare("
  SELECT m.nome
  FROM piano_materia pm
  JOIN materie m ON m.id = pm.materia_id
  WHERE pm.piano_id = :pid
");
$stmt->execute([':pid' => $pianoId]);
$materie = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Studente</title>
</head>
<body>
<h1>Benvenuto, <?= $_SESSION['username'] ?>!</h1>
<h2>Sei uno Studente</h2>

<h3>Genitori:</h3>
<?php if (count($genitori) === 0): ?>
    <p>Non hai genitori associati.</p>
<?php else: ?>
    <ul>
        <?php foreach ($genitori as $g): ?>
            <li><?= $g['genitore'] ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<h3>Classe:</h3>
<p><?= $classe ?></p>

<h3>Piano di studio:</h3>
<?php if (count($materie) === 0): ?>
    <p>Il tuo piano di studio non contiene materie.</p>
<?php else: ?>
    <ul>
        <?php foreach ($materie as $m): ?>
            <li><?= $m['nome'] ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<p><a href="logout.php">Esci</a></p>
</body>
</html>
