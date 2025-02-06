<?php
// La funzione che accetta una callback
function saluta($nome, $callback) {
    // Chiamata della funzione callback passando il nome
    echo $callback($nome);
}

// La funzione callback che restituisce un saluto
function ciao($nome) {
    return "Ciao, " . $nome . "!";
}

// Chiamata alla funzione saluta con la funzione callback 'ciao'
saluta("Mario", 'ciao'); // Output: Ciao, Mario!
