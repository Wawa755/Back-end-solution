<?php
    $number = 0;
    while ($number <= 100){
        echo $number;
        if ($number < 100) {
            echo ", ";
        }
        $number++;
    }
    echo "<br>";

    $number2 = 41;
    while ($number2 < 80) {
        if ($number2 % 3 == 0) {
            echo $number2 . " ";
        }
        $number2++;
    }
?>
