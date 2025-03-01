<?php
$numbers = array(8, 7, 8, 7, 3, 2, 1, 2, 4);

$result = array_unique($numbers);

arsort($result);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Part 3</title>
</head>
<body>
    <?= var_dump($result) ?>
</body>
</html>