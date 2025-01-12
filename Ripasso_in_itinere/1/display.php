<?php
// Raccogliamo i dati inviati tramite POST
$d1 = $_POST['d1'];
$d2 = $_POST['d2'];
$d3 = $_POST['d3'];
$d4 = $_POST['d4'];
$d5 = $_POST['d5'];
$d6 = $_POST['d6'];

// Risposte corrette
$correct_d2 = "MySQL";
$correct_d4 = "Gerarchico";
$correct_d5 = "SQL è strutturato mentre NoSQL è non strutturato";
$correct_d6 = ["Integrità referenziale", "Alta velocità", "Ridondanza controllata"];
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Risultati del Form</title>
</head>
<body>

<h1 class="title">Risultati del Test</h1>

<h2>Risposte:</h2>

<div class="response-container">
    <p><strong>1. Cos'è un DBMS?</strong><br> La tua risposta: <?php echo $d1; ?></p>
</div>

<div class="response-container">
    <p><strong>2. Quale dei seguenti è un DBMS relazionale?</strong><br>
        La tua risposta: <?php echo $d2; ?><br>
        <?php if ($d2 == $correct_d2): ?>
            <span class="correct">Risposta corretta!</span>
        <?php else: ?>
            <span class="incorrect">Risposta sbagliata! La risposta corretta è: <?php echo $correct_d2; ?></span>
        <?php endif; ?>
    </p>
</div>

<div class="response-container">
    <p><strong>3. Quali sono le principali caratteristiche di un DBMS?</strong><br>
        La tua risposta: <?php echo implode(", ", $d3); ?>
    </p>
</div>

<div class="response-container">
    <p><strong>4. Quale modello di database è più adatto per rappresentare dati gerarchici?</strong><br>
        La tua risposta: <?php echo $d4; ?><br>
        <?php if ($d4 == $correct_d4): ?>
            <span class="correct">Risposta corretta!</span>
        <?php else: ?>
            <span class="incorrect">Risposta sbagliata! La risposta corretta è: <?php echo $correct_d4; ?></span>
        <?php endif; ?>
    </p>
</div>

<div class="response-container">
    <p><strong>5. Qual è la differenza principale tra SQL e NoSQL?</strong><br>
        La tua risposta: <?php echo $d5; ?><br>
        <?php if ($d5 == $correct_d5): ?>
            <span class="correct">Risposta corretta!</span>
        <?php else: ?>
            <span class="incorrect">Risposta sbagliata! La risposta corretta è: <?php echo $correct_d5; ?></span>
        <?php endif; ?>
    </p>
</div>

<div class="response-container">
    <p><strong>6. Quali sono i vantaggi principali di un database relazionale?</strong><br>
        La tua risposta: <?php echo implode(", ", $d6); ?><br>
        <?php if (!array_diff($correct_d6, $d6)): ?>
            <span class="correct">Risposta corretta!</span>
        <?php else: ?>
            <span class="incorrect">Risposta sbagliata! Le risposte corrette sono: <?php echo implode(", ", $correct_d6); ?></span>
        <?php endif; ?>
    </p>
</div>

</body>
</html>
