<?php

require_once 'Dispositivo.php';
require_once 'Smartphone.php';

// non posso crearlo dato che è una classe astratta
echo "4a: Creazione di un oggetto di tipo DISPOSITIVO (non posso crearlo dato che è una classe astratta):<br>";
/*try {
    $dispositivo = new Dispositivo("Generico", 100.0); // Questo genererà un errore
} catch (Error $e) {
    echo "Errore: " . $e->getMessage() . "<br>";
}*/
echo "<br>";

// 4b: Creare due oggetti di tipo SMARTPHONE con gli stessi dati e confrontarli
echo "4b: Confronto tra due oggetti di tipo SMARTPHONE:<br>";
$s1 = new Smartphone("Apple", 999.99, "iPhone 14");
$s2 = new Smartphone("Samsung", 1296.00, "Galaxy a 52s");

echo "Confronto con ==: " . ($s1 == $s2 ? "Uguali" : "Diversi").'<br>';
echo "Confronto con ===: " . ($s1 === $s2 ? "Uguali" : "Diversi").'<br>';
echo "<br>";

// 4c: Assegnare uno dei due oggetti SMARTPHONE all'altro e confrontarli
echo "4c: Assegnazione di un oggetto all'altro:<br>";
$s1 = $s2;

echo "Confronto con ==: " . ($s1 == $s2 ? "Uguali" : "Diversi").'<br>';
echo "Confronto con ===: " . ($s1 === $s2 ? "Uguali" : "Diversi").'<br>';
echo "<br>";

// 4d: Clonare un oggetto di tipo SMARTPHONE e confrontarli
echo "4d: Clonazione di un oggetto SMARTPHONE:<br>";
$s3 = clone $s1;

echo "Confronto con ==: " . ($s1 == $s3 ? "Uguali" : "Diversi").'<br>';
echo "Confronto con ===: " . ($s1 === $s3 ? "Uguali" : "Diversi").'<br>';
echo "<br>";

// 5: Testare le seguenti funzioni
echo "5a: Verifica se una classe esiste (class_exists):<br>";
echo class_exists('Dispositivo') ? "La classe Dispositivo esiste.<br>" : "La classe Dispositivo non esiste.<br>";
echo class_exists('Smartphone') ? "La classe Smartphone esiste.<br>" : "La classe Smartphone non esiste.<br>";
echo "<br>";

echo "5b: Recuperare il nome della classe di un oggetto (get_class):<br>";
echo "La classe dell'oggetto s1 è: ".get_class($s1)."<br>";
echo "<br>";

echo "5c: Verifica se un oggetto è istanza di una classe (is_a):<br>";
echo is_a($s1, 'Dispositivo') ? "s1 è un'istanza di Dispositivo.<br>" : "s1 non è un'istanza di Dispositivo.<br>";
echo is_a($s1, 'Smartphone') ? "s1 è un'istanza di Smartphone.<br>" : "s1 non è un'istanza di Smartphone.<br>";
echo "<br>";

echo "5d: Verifica se una proprietà esiste in un oggetto (property_exists):<br>";
echo property_exists($s1, 'marca') ? "La proprietà 'marca' esiste.<br>" : "La proprietà 'marca' non esiste.<br>";
echo property_exists($s1, 'modello') ? "La proprietà 'modello' esiste.<br>" : "La proprietà 'modello' non esiste.<br>";
echo "<br>";

echo "5e: Verifica se un metodo esiste in un oggetto (method_exists):<br>";
echo method_exists($s1, 'stampa') ? "Il metodo 'stampa' esiste.<br>" : "Il metodo 'stampa' non esiste.<br>";
echo method_exists($s1, 'accensione') ? "Il metodo 'accensione' esiste.<br>" : "Il metodo 'accensione' non esiste.<br>";
echo "<br>";

echo "5f: Recuperare il nome della classe con l'operatore ::class (da PHP 8.0):<br>";
echo "La classe dell'oggetto s1 è: ". $s1::class ."<br>";
echo "<br>";


