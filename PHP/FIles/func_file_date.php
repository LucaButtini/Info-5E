<?php
// DATETIME FUNCTIONS EXAMPLES

// Create a new DateTime object
$date = new DateTime();
echo "DateTime(): Current date and time: " . $date->format('Y-m-d H:i:s') . "<br><br>";

// Format the date and time
echo "format(): Formatted date: " . $date->format('d/m/Y H:i') . "<br><br>";

// Set a specific date
$date->setDate(2022, 12, 25);
echo "setDate(): Updated date: " . $date->format('Y-m-d') . "<br><br>";

// Set a specific time
$date->setTime(14, 30, 0);
echo "setTime(): Updated time: " . $date->format('H:i:s') . "<br><br>";

// Add a time interval
$interval = new DateInterval('P1D'); // Period of 1 day
$date->add($interval);
echo "add(): Date after adding 1 day: " . $date->format('Y-m-d') . "<br><br>";

// Subtract a time interval
$date->sub($interval);
echo "sub(): Date after subtracting 1 day: " . $date->format('Y-m-d') . "<br><br>";

// Calculate the difference between two dates
$date1 = new DateTime('2023-01-01');
$date2 = new DateTime('2023-12-31');
$diff = $date1->diff($date2);
echo "diff(): Difference between dates: " . $diff->days . " days<br><br>";

// Modify the date by adding or subtracting directly
$date->modify('+2 weeks');
echo "modify(): Date after adding 2 weeks: " . $date->format('Y-m-d') . "<br><br>";

// Create and use a DateInterval object
$dateInterval = new DateInterval('P2M'); // Period of 2 months
$date->add($dateInterval);
echo "DateInterval(): Date after adding 2 months: " . $date->format('Y-m-d') . "<br><br>";


// FILE FUNCTIONS EXAMPLES

// Get the current working directory
echo "getcwd(): Current directory: " . getcwd() . "<br><br>";

// Show directory separator constant
echo "DIRECTORY_SEPARATOR: " . DIRECTORY_SEPARATOR . "<br><br>";

// Check if a file exists
$filename = 'test.txt';
echo "file_exists(): Does test.txt exist? " . (file_exists($filename) ? "Yes" : "No") . "<br><br>";

// Check if it's a file or a directory
echo "is_file(): Is it a file? " . (is_file($filename) ? "Yes" : "No") . "<br><br>";
echo "is_dir(): Is it a directory? " . (is_dir($filename) ? "Yes" : "No") . "<br><br>";

// List files and directories in a directory
$files = scandir(getcwd());
echo "scandir(): Files in current directory: ";
print_r($files);
echo "<br><br>";

// Get the contents of a file
if (file_exists($filename)) {
    $contents = file_get_contents($filename);
    echo "file_get_contents(): Contents of test.txt: $contents<br><br>";
}

// Write contents to a file
file_put_contents($filename, "Hello, World!");
echo "file_put_contents(): Written 'Hello, World!' to test.txt<br><br>";

// Copy a file
copy($filename, 'copy_test.txt');
echo "copy(): test.txt copied to copy_test.txt<br><br>";

// Rename a file
rename('copy_test.txt', 'renamed_test.txt');
echo "rename(): copy_test.txt renamed to renamed_test.txt<br><br>";

// Delete a file
unlink('renamed_test.txt');
echo "unlink(): renamed_test.txt deleted<br><br>";

// Working with large files using fopen(), fgets(), and fwrite()
$file = fopen($filename, 'r');
if ($file) {
    echo "fopen(): Reading file line by line:<br>";
    while (!feof($file)) {
        $line = fgets($file);
        echo htmlspecialchars($line) . "<br>";
    }
    fclose($file);
    echo "<br>fclose(): Closed the file<br><br>";
}

// Append to a file using fwrite()
$file = fopen($filename, 'a');
if ($file) {
    fwrite($file, "\nAppended line.");
    fclose($file);
    echo "fwrite(): Appended a new line to test.txt<br><br>";
}
