<?php
$number = rand(1,100);

if ($number >= 1 && $number <= 10) {
    $message = "The number lies between 0 and 10";
} 
elseif ($number >= 11 && $number <= 20) {
    $message = "The number lies between 10 and 20";
} 
elseif ($number >= 21 && $number <= 30) {
    $message = "The number lies between 20 and 30";
} 
elseif ($number >= 31 && $number <= 40) {
    $message = "The number lies between 30 and 40";
} 
elseif ($number >= 41 && $number <= 50) {
    $message = "The number lies between 40 and 50";
} 
elseif ($number >= 51 && $number <= 60) {
    $message = "The number lies between 50 and 60";
} 
elseif ($number >= 61 && $number <= 70) {
    $message = "The number lies between 60 and 70";
} 
elseif ($number >= 71 && $number <= 80) {
    $message = "The number lies between 70 and 80";
} 
elseif ($number >= 81 && $number <= 90) {
    $message = "The number lies between 80 and 90";
} 
elseif ($number >= 91 && $number <= 100) {
    $message = "The number lies between 90 and 100";
}

$messageReversed = strrev($message);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php var_dump($messageReversed)?>
</body>
</html>