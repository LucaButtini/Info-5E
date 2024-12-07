<?php
// String operations examples

$str = "Hello World";
echo "String: " . $str;
echo "<br>";
echo "<br>";

// 1 - Get the length of the string
echo "String length: " . strlen($str);
echo "<br>";
echo "<br>";

// 2 - Extract a substring from the string
echo "Substring: " . substr($str, 3, 7);
echo "<br>";
echo "<br>";

// 3 - Replace part of the string
echo "Replace part of the string: " . substr_replace($str, "Ciao", 3, 7);
echo "<br>";
echo "<br>";

// 4 - Trim spaces from the start and end of the string
echo "Trim spaces: " . trim("  Hello  ");
echo "<br>";
echo "<br>";

// 5 - Trim spaces from the beginning of the string
echo "Trim spaces at the start: " . ltrim("  Hello  ");
echo "<br>";
echo "<br>";

// Trim spaces from the end of the string
echo "Trim spaces at the end: " . rtrim("  Hello  ");
echo "<br>";
echo "<br>";

// 6 - Remove backslashes from the string
echo "Remove backslashes: " . stripslashes("Hello\'s World");
echo "<br>";
echo "<br>";

// 7 - Add padding to the string
echo "Add padding: " . str_pad("Hello", 10, "*");
echo "<br>";
echo "<br>";

// 8 - Find the position of the first occurrence of a substring
echo "First occurrence position: " . strpos($str, "o");
echo "<br>";
echo "<br>";

// Find the position of the last occurrence of a substring
echo "Last occurrence position: " . strrpos($str, "o");
echo "<br>";
echo "<br>";

// 10 - Find the position of a substring (case-insensitive)
echo "Position (case-insensitive): " . stripos($str, "W");
echo "<br>";
echo "<br>";

// 11 - Check if the string contains a substring
echo "Contains substring: " . (str_contains($str, "World") ? "Yes" : "No");
echo "<br>";
echo "<br>";

// 12 - Check if the string starts with a specific substring
echo "Starts with substring: " . (str_starts_with($str, "Hello") ? "Yes" : "No");
echo "<br>";
echo "<br>";

// 13 - Check if the string ends with a specific substring
echo "Ends with substring: " . (str_ends_with($str, "World") ? "Yes" : "No");
echo "<br>";
echo "<br>";

// 14 - Convert the string to uppercase
echo "Uppercase: " . strtoupper($str);
echo "<br>";
echo "<br>";

// 15 - Convert the string to lowercase
echo "Lowercase: " . strtolower($str);
echo "<br>";
echo "<br>";

// 16 - Capitalize the first letter of the string
echo "Capitalize first letter: " . ucfirst(strtolower($str));
echo "<br>";
echo "<br>";

// 17 - Capitalize the first letter of each word
echo "Capitalize first letter of each word: " . ucwords(strtolower("ciao come stai"));
echo "<br>";
echo "<br>";

// 18 - Reverse the string
echo "Reversed string: " . strrev($str);
echo "<br>";
echo "<br>";

// 19 - Shuffle the string randomly
echo "Shuffled string: " . str_shuffle($str);
echo "<br>";
echo "<br>";

// 20 - Repeat the string multiple times
echo "Repeated string: " . str_repeat("He ", 3);
echo "<br>";
echo "<br>";

// 21 - Replace a substring with another
echo "Replace word in string: " . str_replace("World", "Mondo", $str);
echo "<br>";
echo "<br>";

// 22 - Compare two strings (case-sensitive)
echo "Compare strings (case-sensitive): " . strcmp("Hello", "hello");
echo "<br>";
echo "<br>";

// 23 - Compare two strings (case-insensitive)
echo "Compare strings (case-insensitive): " . strcasecmp("Hello", "hello");
echo "<br>";
echo "<br>";

// 24 - Compare strings naturally (natural order)
echo "Natural order comparison: " . strnatcmp("str2", "str1");
echo "<br>";
echo "<br>";

// 25 - Split a string into an array
$arr = explode(" ", $str);
echo "Split string into array: ";
print_r($arr);
echo "<br>";
echo "<br>";

// 26 - Join array elements into a string
echo "Join array into string: " . implode("-", $arr);
echo "<br>";
echo "<br>";

// 27 - Convert ASCII code to character
echo "ASCII to character: " . chr(65);
echo "<br>";
echo "<br>";

// Convert character to ASCII code
echo "Character to ASCII: " . ord("A");
echo "<br>";
echo "<br>";

