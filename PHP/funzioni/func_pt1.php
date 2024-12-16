<?php
// UNION TYPE
// Una funzione può accettare più tipi di input grazie all'Union Type (es. int|float).
// Questa funzione calcola un'operazione (somma o moltiplicazione) tra due numeri.
echo "Union Type:<br>";
function calculateValue(int|float $a, int|float $b, string $operation): int|float {
    if ($operation === "add") {
        return $a + $b; // Somma
    } elseif ($operation === "multiply") {
        return $a * $b; // Moltiplicazione
    }
    return 0; // Caso predefinito
}
echo calculateValue(5, 3, "add") . "<br>";      // Output: 8
echo calculateValue(5.5, 2, "multiply") . "<br>"; // Output: 11

echo "<br>";

// DEFAULT VALUE
// Una funzione può avere parametri con valori predefiniti. Se non viene passato un parametro,
// il valore di default sarà usato (in questo caso, "Ospite").
echo "Default Value:<br>";
function welcomeMessage(string $name = "Ospite"): string {
    return "Benvenuto, $name!";
}
echo welcomeMessage() . "<br>";         // Output: Benvenuto, Ospite!
echo welcomeMessage("Maria") . "<br>"; // Output: Benvenuto, Maria!

echo "<br>";

// REF TYPE VS VALUE TYPE
// Differenza tra passaggio per valore (copia) e per riferimento (modifica l'originale).
echo "Reference vs Value Type:<br>";
function doubleValue($number) {
    $number *= 2; // Modifica solo una copia del valore, non l'originale.
}
function doubleReference(&$number) {
    $number *= 2; // Modifica il valore originale grazie al passaggio per riferimento.
}
$num = 10;
doubleValue($num);
echo "Value Type: $num<br>"; // Output: 10 (non modificato)
doubleReference($num);
echo "Reference Type: $num<br>"; // Output: 20 (modificato)

echo "<br>";

// NULLABLE PARAMETER
// I parametri possono essere definiti come "nullable" aggiungendo il punto interrogativo (?).
// Questo permette di accettare valori nulli oltre al tipo specificato.
echo "Nullable Parameter:<br>";
function displayMessage(?string $message): string {
    // L'operatore ?? ritorna un valore predefinito se il parametro è null.
    return $message ?? "Nessun messaggio fornito";
}
echo displayMessage("Ciao!") . "<br>";       // Output: Ciao!
echo displayMessage(null) . "<br>";         // Output: Nessun messaggio fornito

echo "<br>";

// VARIADIC FUNCTION
// Una funzione può accettare un numero variabile di parametri usando "...".
// I parametri vengono raccolti in un array.
echo "Variadic Function:<br>";
function calculateSum(...$numbers): int {
    return array_sum($numbers); // Somma tutti i numeri passati.
}
echo calculateSum(1, 2, 3, 4, 5) . "<br>";  // Output: 15
echo calculateSum(10, 20, 30) . "<br>";     // Output: 60

echo "<br>";

// VARIABLE FUNCTION
// Si può chiamare una funzione il cui nome è contenuto in una variabile.
// Qui usiamo una variabile per decidere dinamicamente quale funzione chiamare.
echo "Variable Function:<br>";
function addition($a, $b): int {
    return $a + $b;
}
function subtraction($a, $b): int {
    return $a - $b;
}
// Randomizziamo quale funzione chiamare (addition o subtraction).
$randomFunction = mt_rand(0, 1) ? "addition" : "subtraction";
echo "Eseguito: $randomFunction<br>";
// La variabile contiene il nome della funzione, che viene eseguita come tale.
echo $randomFunction(10, 5) . "<br>"; // Output dipende dalla funzione scelta

echo "<br>";

// CALLBACK
// Una funzione può accettare un'altra funzione come parametro (callback).
// Questo permette di applicare operazioni personalizzate a una lista di dati.
echo "Callback Function:<br>";
function processList(array $list, callable $callback): array {
    // Applica il callback a ogni elemento dell'array usando array_map.
    return array_map($callback, $list);
}
$numbers = [1, 2, 3, 4];
$processed = processList($numbers, function($n) {
    return $n * $n; // Ritorna il quadrato di ogni numero.
});
print_r($processed); // Output: Array con i quadrati degli elementi
echo "<br>";

echo "<br>";

// ANONYMOUS FUNCTIONS
// Le funzioni anonime non hanno un nome e possono essere salvate in variabili o passate come parametri.
// Sono utili per operazioni semplici e temporanee.
echo "Anonymous Functions:<br>";
$multiply = function(int $a, int $b): int {
    return $a * $b; // Ritorna il prodotto di due numeri.
};
echo $multiply(4, 5) . "<br>"; // Output: 20
