<?php 
    $number = 1;

    if ($number == 1){
        $day = "monday";
    }

    if ($number == 2){
        $day = "tuesday";
    }

    if ($number == 3){
        $day = "wednesday";
    }

    if ($number == 4){
        $day = "thursday";
    }

    if ($number == 5){
        $day = "friday";
    }

    if ($number == 6){
        $day = "saturday";
    }

    if ($number == 7){
        $day = "sunday";
    }

    //part 2
    $dayUppercase = strtoupper($day);
    $dayUppercase = str_replace("A", "a", $dayUppercase);
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=ž
    , initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p><?php echo $day ?></p>
    <p><?php echo $dayUppercase ?></p>
</body>
</html>