<?php
// 1. Union Type
function calculateArea(int|float $value): int|float {
    return $value * $value;
}

// Test union type
echo "Union Type:<br>";
echo calculateArea(5) . "<br>";      // Output: 25
echo calculateArea(5.5) . "<br>";    // Output: 30.25
echo "----------------------------<br>";

// 2. Default Value
function greet(string $name = "Guest"): string {
    return "Hello, $name!";
}

// Test default value
echo "<br>Default Value:<br>";
echo greet() . "<br>";               // Output: Hello, Guest!
echo greet("Alice") . "<br>";      // Output: Hello, Alice!
echo "----------------------------<br>";

// 3. Ref Type, Value Type
function incrementByValue($num) {
    $num++;
}

function incrementByReference(&$num) {
    $num++;
}

$value = 10;
incrementByValue($value);
echo "<br>Ref/Value Type:<br>";
echo $value . "<br>";               // Output: 10

incrementByReference($value);
echo $value . "<br>";               // Output: 11
echo "----------------------------<br>";

// 4. Nullable Parameter
function printMessage(?string $message): void {
    echo $message ?? "No message provided.";
}

// Test nullable parameter
echo "<br>Nullable Parameter:<br>";
printMessage("Hello!");             // Output: Hello!
echo "<br>";
printMessage(null);                  // Output: No message provided.
echo "<br>----------------------------<br>";

// 5. Variadic Function
function sumAll(...$numbers): int {
    return array_sum($numbers);
}

// Test variadic function
echo "<br>Variadic Function:<br>";
echo sumAll(1, 2, 3, 4) . "<br>";   // Output: 10
echo "----------------------------<br>";

// 6. Variable Function
function sayHello() {
    return "Hello!";
}

$func = "sayHello";

// Test variable function
echo "<br>Variable Function:<br>";
echo $func() . "<br>";              // Output: Hello!
echo "----------------------------<br>";

// 7. Callback
function processArray(array $arr, callable $callback): array {
    return array_map($callback, $arr);
}

// Test callback function
$result = processArray([1, 2, 3], fn($n) => $n * 2);
echo "<br>Callback:<br>";
print_r($result);
echo "<br>----------------------------<br>";

// 8. Anonymous Functions
$greet = function(string $name): string {
    return "Hello, $name!";
};

// Test anonymous function
echo "<br>Anonymous Functions:<br>";
echo $greet("Alice") . "<br>";      // Output: Hello, Alice!
echo "----------------------------<br>";

// General Exercise
function processMixedArray(array $values): array {
    $strings = array_filter($values, fn($v) => is_string($v));
    $numbers = array_filter($values, fn($v) => is_numeric($v));

    $processedStrings = processArray($strings, fn($s) => strtoupper($s));
    $processedNumbers = processArray($numbers, fn($n) => $n * 2);

    return [
        'strings' => $processedStrings,
        'numbers' => $processedNumbers,
    ];
}

// Test general exercise
echo "<br>General Exercise:<br>";
$mixed = ["hello", 2, "world", 3.5, "php"];
$result = processMixedArray($mixed);
print_r($result);
echo "<br>----------------------------<br>";

