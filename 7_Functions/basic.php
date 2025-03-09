<?php
    function calculateSum($number1, $number2){
        $Sum = $number1 + $number2;
        return $Sum;
    };

    function multiply($number1, $number2){
        $Product = $number1 * $number2;
        return $Product;
    };

    function isEven($number){
        if ($number % 2 == 0) {
            return true;
        } else {
            return false;
        }
    };
    
    $number1 = 4;
    $number2 = 5;
    $number = 6;

    $result = calculateSum($number1, $number2);
    $result2 = multiply($number1, $number2);

    
if (isEven($number)) {
    echo $number . " is even.";
} else {
    echo $number . " is odd.";
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
    <p><?= "The sum of " . $number1 . " and " . $number2 . " is: " . $result; ?></p>
    <p><?= "The product of " . $number1 . " and " . $number2 . " is: " . $result2; ?></p>
</body>
</html>