<?php
$letter = "e";
$number = 3;
$longestWord = "pneumonoultramicroscopicsilicovolcanoconiosis";
$replaceE = str_replace($letter, $number, $longestWord);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<p><?php echo $replaceE ?></p>
</body>
</html>