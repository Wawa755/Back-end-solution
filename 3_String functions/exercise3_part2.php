<?php
$fruit = 'pineapple';
$fruitWordLength = strlen($fruit);
$fruitOPosition = strpos($fruit, "a");
$fruitUppercase = strtoupper($fruit);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <p><?php echo $fruit ?></p>
    <p><?php echo $fruitOPosition ?></p>
    <p><?php echo $fruitUppercase ?></p>

</body>
</html>