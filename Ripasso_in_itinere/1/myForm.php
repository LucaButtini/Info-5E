<?php
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="stile.css">
    <title>Domande</title>
</head>
<body>
<div id="intro">
    <h1>DOMANDE DBMS</h1>
    <p>Rispondi alle seguenti domande relative ai DBMS:</p>
</div>
<div class="container">
    <br>
    <form method="post" action="display.php">

        <!-- Domanda 1 -->
        <label for="d1">1. Cos'è un DBMS?</label>
        <br>
        <textarea id="d1" rows="5" cols="40" name="d1"></textarea>
        <br><br>

        <!-- Domanda 2 -->
        <label for="d2">2. Quale dei seguenti è un DBMS relazionale?</label>
        <br>
        <input type="radio" id="mysql" name="d2" value="MySQL">
        <label for="mysql">MySQL</label>
        <br>
        <input type="radio" id="mongodb" name="d2" value="MongoDB">
        <label for="mongodb">MongoDB</label>
        <br>
        <input type="radio" id="redis" name="d2" value="Redis">
        <label for="redis">Redis</label>
        <br><br>

        <!-- Domanda 3 -->
        <label for="d3">3. Quali sono le principali caratteristiche di un DBMS? (Seleziona tutte le opzioni corrette)</label>
        <br>
        <input type="checkbox" id="c1" name="d3[]" value="Gestione dati">
        <label for="c1">Gestione dati</label>
        <br>
        <input type="checkbox" id="c2" name="d3[]" value="Alta scalabilità">
        <label for="c2">Alta scalabilità</label>
        <br>
        <input type="checkbox" id="c3" name="d3[]" value="Supporto per crittografia">
        <label for="c3">Supporto per crittografia</label>
        <br>
        <input type="checkbox" id="c4" name="d3[]" value="Gestione dispositivi hardware">
        <label for="c4">Gestione dispositivi hardware</label>
        <br><br>

        <!-- Domanda 4 -->
        <label for="d4">4. Quale modello di database è più adatto per rappresentare dati gerarchici?</label>
        <br>
        <select id="d4" name="d4">
            <option value="Relazionale">Relazionale</option>
            <option value="Gerarchico">Gerarchico</option>
            <option value="Documentale">Documentale</option>
            <option value="Grafi">Grafi</option>
        </select>
        <br><br>

        <!-- Domanda 5 -->
        <label for="d5">5. Qual è la differenza principale tra SQL e NoSQL?</label>
        <br>
        <textarea id="d5" rows="5" cols="40" name="d5"></textarea>
        <br><br>

        <!-- Domanda 6 -->
        <label for="d6">6. Quali sono i vantaggi principali di un database relazionale? (Seleziona più opzioni)</label>
        <br>
        <select id="d6" name="d6[]" multiple size="4">
            <option value="Integrità referenziale">Integrità referenziale</option>
            <option value="Alta velocità">Alta velocità</option>
            <option value="Ridondanza controllata">Ridondanza controllata</option>
            <option value="Modellazione flessibile">Modellazione flessibile</option>
        </select>
        <br><br>

        <!-- Bottone di submit -->
        <input type="submit" value="Submit">
    </form>
</div>

</body>
</html>
