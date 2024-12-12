<?php
// ARRAY FUNCTIONS EXAMPLES

// Create an array to work with
$array = [10, 20, 30, 40, 50];
echo "Original Array: ";
print_r($array);
echo "<br><br>";

// Creates an array containing a range of elements
$rangeArray = range(1, 10);
echo "range(): ";
print_r($rangeArray);
echo "<br><br>";

// Fills an array with a specified value
$filledArray = array_fill(0, 5, "PHP");
echo "array_fill(): ";
print_r($filledArray);
echo "<br><br>";

// Pads an array to the specified length
$paddedArray = array_pad($array, 10, 0);
echo "array_pad(): ";
print_r($paddedArray);
echo "<br><br>";

// Merges multiple arrays into one
$mergedArray = array_merge($array, $rangeArray);
echo "array_merge(): ";
print_r($mergedArray);
echo "<br><br>";

// Extracts a portion of an array
$slicedArray = array_slice($array, 2, 3);
echo "array_slice(): ";
print_r($slicedArray);
echo "<br><br>";

// Removes and returns the last element of an array
$lastElement = array_pop($array);
echo "array_pop(): Removed element: $lastElement<br>";
print_r($array);
echo "<br><br>";

// Removes and returns the first element of an array
$firstElement = array_shift($array);
echo "array_shift(): Removed element: $firstElement<br>";
print_r($array);
echo "<br><br>";

// Returns the sum of all values in an array
$arraySum = array_sum($array);
echo "array_sum(): Sum of array: $arraySum<br><br>";

// Checks if a value exists in an array
$exists = in_array(30, $array) ? "Yes" : "No";
echo "in_array(): Does 30 exist in the array? $exists<br><br>";

// Searches for a value and returns its key
$key = array_search(40, $array);
echo "array_search(): Key of 40: $key<br><br>";

// Counts the occurrences of values in an array
$countValues = array_count_values([10, 20, 10, 30, 10, 20]);
echo "array_count_values(): ";
print_r($countValues);
echo "<br><br>";

// Sorts an array in ascending order
sort($array);
echo "sort(): ";
print_r($array);
echo "<br><br>";

// Sorts an array in descending order
rsort($array);
echo "rsort(): ";
print_r($array);
echo "<br><br>";

// ASSOCIATIVE ARRAY EXAMPLES

// Create an associative array
$assocArray = ["b" => 2, "a" => 1, "d" => 4, "c" => 3];
echo "Original Associative Array: ";
print_r($assocArray);
echo "<br><br>";

// Sorts an associative array in ascending order by value
asort($assocArray);
echo "asort(): ";
print_r($assocArray);
echo "<br><br>";

// Sorts an associative array in descending order by value
arsort($assocArray);
echo "arsort(): ";
print_r($assocArray);
echo "<br><br>";

// Sorts an associative array by key in ascending order
ksort($assocArray);
echo "ksort(): ";
print_r($assocArray);
echo "<br><br>";

// Sorts an associative array by key in descending order
krsort($assocArray);
echo "krsort(): ";
print_r($assocArray);
echo "<br><br>";

