<?php
//part 1
$animal = array('doplhin', 'kangaroo', 'shark', 'giraffe', 'cockroach', 'zebra');

$amountOfAnimals = count($animal);
//if ($anountOfAnimals > 0)

$teZoekenDier = 'shark';

if(in_array($teZoekenDier, $animal) )
{
    $result = $teZoekenDier . ' was found in the array.';
}
else
{
    $result = $teZoekenDier . ' was not found in the array.';
}

//part 2
$animal2 = array('doplhin', 'kangaroo', 'shark', 'giraffe', 'cockroach', 'zebra');
$mammals = array('cow', 'bat', 'baboon');

$mergedAnimals = array_merge($animal2, $mammals);

$amountOfAnimals = count($animal2);
//if ($anountOfAnimals > 0)

$teZoekenDier = 'shark';

if(in_array($teZoekenDier, $animal2) )
{
    $result = $teZoekenDier . ' was found in the array.';
}
else
{
    $result = $teZoekenDier . ' was not found in the array.';
}

sort($animal2);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p> Number of animals in array: <?= $amountOfAnimals ?></p>

    <p><?= $result ?></p>
    <p><?php var_dump($animal2) ?></p>
    <p><?php var_dump($mergedAnimals) ?></p>
</body>
</html>