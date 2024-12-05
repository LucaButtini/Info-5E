<?php
// Prove stringhe

$str = "Hello World";
echo "Stringa: " . $str;
echo "<br>";
echo "<br>";

// 1
echo "Lunghezza stringa: " . strlen($str);
echo "<br>";
echo "<br>";

// 2
echo "Porzione stringa: " . substr($str, 3, 7);
echo "<br>";
echo "<br>";

// 3
echo "Rimpiazza parte della stringa: " . substr_replace($str, "Ciao", 3, 7);
echo "<br>";
echo "<br>";

// 4
echo "Rimuovi spazi iniziali e finali: " . trim("  Hello  ");
echo "<br>";
echo "<br>";

// 5
echo "Rimuovi spazi solo all'inizio: " . ltrim("  Hello  ");
echo "<br>";
echo "<br>";

echo "Rimuovi spazi solo alla fine: " . rtrim("  Hello  ");
echo "<br>";
echo "<br>";

// 6
echo "Rimuovi backslash: " . stripslashes("Hello\'s World");
echo "<br>";
echo "<br>";

// 7
echo "Aggiungi padding alla stringa: " . str_pad("Hello", 10, "*");
echo "<br>";
echo "<br>";

// 8
echo "Trova posizione prima occorrenza: " . strpos($str, "o");
echo "<br>";
echo "<br>";

echo "Trova posizione ultima occorrenza: " . strrpos($str, "o");
echo "<br>";
echo "<br>";

// 10
echo "Trova posizione ignorando maiuscole/minuscole: " . stripos($str, "W");
echo "<br>";
echo "<br>";

// 11
echo "Contiene la sottostringa: " . (str_contains($str, "World") ? "Sì" : "No");
echo "<br>";
echo "<br>";

// 12
echo "Inizia con la sottostringa: " . (str_starts_with($str, "Hello") ? "Sì" : "No");
echo "<br>";
echo "<br>";

// 13
echo "Finisce con la sottostringa: " . (str_ends_with($str, "World") ? "Sì" : "No");
echo "<br>";
echo "<br>";

// 14
echo "Tutto maiuscolo: " . strtoupper($str);
echo "<br>";
echo "<br>";

// 15
echo "Tutto minuscolo: " . strtolower($str);
echo "<br>";
echo "<br>";

// 16
echo "Prima lettera maiuscola: " . ucfirst(strtolower($str));
echo "<br>";
echo "<br>";

// 17
echo "Prima lettera di ogni parola maiuscola: " . ucwords(strtolower("ciao come stai"));
echo "<br>";
echo "<br>";

// 18
echo "Stringa invertita: " . strrev($str);
echo "<br>";
echo "<br>";

// 19
echo "Stringa mescolata: " . str_shuffle($str);
echo "<br>";
echo "<br>";

// 20
echo "Ripeti stringa: " . str_repeat("He ", 3);
echo "<br>";
echo "<br>";

// 21
echo "Sostituisci parola nella stringa: " . str_replace("World", "Mondo", $str);
echo "<br>";
echo "<br>";

// 22
echo "Confronta due stringhe (case-sensitive): " . strcmp("Hello", "hello");
echo "<br>";
echo "<br>";

// 23
echo "Confronta due stringhe ignorando maiuscole/minuscole: " . strcasecmp("Hello", "hello");
echo "<br>";
echo "<br>";


// 24
echo "Confronto naturale tra stringhe: " . strnatcmp("str2", "str1");
echo "<br>";
echo "<br>";

// 25
$arr = explode(" ", $str);
echo "Dividi stringa in array: ";
print_r($arr);
echo "<br>";
echo "<br>";

// 26
echo "Unisci array in stringa: " . implode("-", $arr);
echo "<br>";
echo "<br>";

// 27
echo "Da codice ASCII a carattere: " . chr(65);
echo "<br>";
echo "<br>";

echo "Da carattere a codice ASCII: " . ord("A");
echo "<br>";
echo "<br>";





