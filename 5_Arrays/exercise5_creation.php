<?php

//done in pair with Petra because my laptop wasn't working

//part 1
$animal = array( 'dog', 'cat', 'pidgeon', 'mouse', 'bird', 'snake', 'hamster', 'fish', 'lion', 'tiger');

$animal2[] = 'penguin';
$animal2[] = 'parrot';
$animal2[] = 'krtko';
$animal2[] = 'fly';
$animal2[] = 'antilope';
$animal2[] = 'leopard';
$animal2[] = 'cheetah';
$animal2[] = 'snail';
$animal2[] = 'cricket';
$animal2[] = 'elephant'; 

$vehicles = array(
    'landVehicles' => array('car', 'bus', 'bike', 'truck', 'tractor'),
    'waterVehicles' => array('surfboard', 'raft', 'cruiser', 'kayak', 'jetski'),
    'airVehicles' => array('helicopter', 'plane', 'jet','hot air baloon', 'spaceship' ),
);

//part 2

$numbers = array(1, 2, 3, 4, 5);
$product = array_product($numbers);

$oddNumbers = array();

foreach ($numbers as $num){
    if ($num % 2 !==0) {
        $oddNumbers[] = $num;
    }
}
//array_reverse
//foreach looping, if isset
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<h2>Part 1</h2>
    <?php var_dump($vehicles)?>

<h2>Part 2</h2>
<p><?= $product ?></p>
<p><?= $oddNumbers ?></p>
</body>
</html>