<?php
for ($number = 0; $number <= 100; $number++) {
    echo $number;
    if ($number < 100) {
        echo ", ";
    }
}
echo "<br>";

// Second part: Print numbers divisible by 3, greater than 40, and smaller than 80
for ($number2 = 41; $number2 < 80; $number2++) {
    if ($number2 % 3 == 0) {
        echo $number2 . " ";
    }
}
?>
