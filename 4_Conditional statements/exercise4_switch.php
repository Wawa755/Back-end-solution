<?php
$number = rand(1,7);

switch ($number) {
    case 1:
        $day = "monday";
        break;

    case 2:
        $day = "tuesday";
        break;

    case 3:
        $day = "wednesday";
        break;

    case 4:
        $day = "thursday";
        break;

    case 5:
        $day = "friday";
        break;

    case 6:
        $day = "saturday";
        break;

    case 7:
        $day = "sunday";
        break;
        
    default:
        $day = "Error, keep the number between 1 and 7!";
        break;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>The number <?= $number ?> is <?=  $day?></p>
</body>
</html>