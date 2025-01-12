<?php
// funzione per l'analisi del testo
function analizzaTesto($testo) {
    // tolgo gli spazi iniziali e finali
    $testo = trim($testo);
    $numeroParole = 0;
    $numeroVocali = 0;
    $numeroConsonanti = 0;
    $numeroNumeri = 0;


    $vocali = ['a', 'e', 'i', 'o', 'u'];
    $consonanti = ['b', 'c', 'd', 'f', 'g', 'h', 'j', 'k', 'l', 'm', 'n', 'p', 'q', 'r', 's', 't', 'v', 'w', 'x', 'y', 'z'];


    $testo = strtolower($testo);


    $parole = explode(" ", $testo);
    $numeroParole = count($parole);

    //scorro ogni carattere
    for ($i = 0; $i < strlen($testo); $i++) {
        $carattere = $testo[$i];

       //lettera
        if (ctype_alpha($carattere)) {
            //  vocale
            if (in_array($carattere, $vocali)) {
                $numeroVocali++;
            }
            // consonante
            elseif (in_array($carattere, $consonanti)) {
                $numeroConsonanti++;
            }
        }
        //  numero
        elseif (ctype_digit($carattere)) {
            $numeroNumeri++;
        }
    }

    return [
        'parole' => $numeroParole,
        'vocali' => $numeroVocali,
        'consonanti' => $numeroConsonanti,
        'numeri' => $numeroNumeri
    ];
}

// Raccogliamo i dati inviati tramite POST
$nome = $_POST['nome'];
$cognome = $_POST['cognome'];
$email = $_POST['email'];
$password = $_POST['password'];

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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Risultati del Form</title>
    <link rel="stylesheet" href="stile.css">
</head>
<body>
<div id="intro2">
    <h1 class="titolo">Risultati del Test</h1>
</div>

<!-- Dati personali -->
<div class="response-container">
    <h3>Dati Personali</h3>
    <p><strong>Nome:</strong> <?php echo htmlspecialchars($nome); ?></p>
    <p><strong>Cognome:</strong> <?php echo htmlspecialchars($cognome); ?></p>
    <p><strong>Email:</strong> <?php echo htmlspecialchars($email); ?></p>
    <p><strong>Password:</strong> <?php echo htmlspecialchars($password); ?></p>
</div>

<!-- Domanda 1 -->
<div class="response-container">
    <p><strong>1. Cos'è un DBMS?</strong></p>
    <p>La tua risposta: <?php echo htmlspecialchars($d1); ?></p>
    <p>Analisi del testo: <?php
        $analisi = analizzaTesto($d1);
        echo "Parole: {$analisi['parole']}, Vocali: {$analisi['vocali']}, Consonanti: {$analisi['consonanti']}, Numeri: {$analisi['numeri']}";
        ?></p>
</div>

<!-- Domanda 2 -->
<div class="response-container">
    <p><strong>2. Quale dei seguenti è un DBMS relazionale?</strong></p>
    <p>La tua risposta: <?php echo htmlspecialchars($d2); ?></p>
    <p>
        <?php if ($d2 == $correct_d2): ?>
            <span class="correct">Risposta corretta!</span>
        <?php else: ?>
            <span class="incorrect">Risposta sbagliata! La risposta corretta è: <?php echo $correct_d2; ?></span>
        <?php endif; ?>
    </p>
</div>

<!-- Domanda 3 -->
<div class="response-container">
    <p><strong>3. Quali sono le principali caratteristiche di un DBMS?</strong></p>
    <p>La tua risposta: <?php echo htmlspecialchars(implode(", ", $d3)); ?></p>
    <p>
        <?php if (in_array('Caratteristica', $d3)): // Aggiungi qui le caratteristiche corrette ?>
            <span class="correct">Risposta corretta!</span>
        <?php else: ?>
            <span class="incorrect">Risposta sbagliata! Le risposte corrette sono: X, Y, Z</span>
        <?php endif; ?>
    </p>
</div>

<!-- Domanda 4 -->
<div class="response-container">
    <p><strong>4. Quale modello di database è più adatto per rappresentare dati gerarchici?</strong></p>
    <p>La tua risposta: <?php echo htmlspecialchars($d4); ?></p>
    <p>
        <?php if ($d4 == $correct_d4): ?>
            <span class="correct">Risposta corretta!</span>
        <?php else: ?>
            <span class="incorrect">Risposta sbagliata! La risposta corretta è: <?php echo $correct_d4; ?></span>
        <?php endif; ?>
    </p>
</div>

<!-- Domanda 5 -->
<div class="response-container">
    <p><strong>5. Qual è la differenza principale tra SQL e NoSQL?</strong></p>
    <p>La tua risposta: <?php echo htmlspecialchars($d5); ?></p>
    <p>Analisi del testo: <?php
        $analisi = analizzaTesto($d5);
        echo "Parole: {$analisi['parole']}, Vocali: {$analisi['vocali']}, Consonanti: {$analisi['consonanti']}, Numeri: {$analisi['numeri']}";
        ?></p>
</div>

<!-- Domanda 6 -->
<div class="response-container">
    <p><strong>6. Quali sono i vantaggi principali di un database relazionale?</strong></p>
    <p>La tua risposta: <?php echo htmlspecialchars(implode(", ", $d6)); ?></p>
    <p>
        <?php if (!array_diff($correct_d6, $d6)): ?>
            <span class="correct">Risposta corretta!</span>
        <?php else: ?>
            <span class="incorrect">Risposta sbagliata! Le risposte corrette sono: <?php echo implode(", ", $correct_d6); ?></span>
        <?php endif; ?>
    </p>
</div>

</body>
</html>
