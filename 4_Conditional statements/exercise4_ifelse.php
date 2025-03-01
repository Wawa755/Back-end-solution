<?php
$year = 2024;
	
if ($year % 4 == 0 && $year % 400 == 0){
    $reply = "The year is a leap year";
} 
else 
{
    $reply = "The year is not a leap year";
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
    <p> <?php echo $reply ?></p>
</body>
</html>