<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<h2>Contents of the tetx file:</h2>

<?php
    $text = file_get_contents('text-file.txt');
        echo "<pre>$text</pre>";

    $textCharas = str_split($text);
    rsort($textCharas);
    $textCharas = array_reverse($textCharas);
        echo "<br>" . implode(" ", $textCharas);

    $charaCounts = array();
     foreach ($textCharas as $chara) {
        if (isset($charaCounts[$chara])) {
            $charaCounts[$chara]++;
        } else {
            $charaCounts[$chara] = 1;
        }
     }
        echo "<h2>Character Counts:</h2>";
        echo "<p>Total different characters: " . count($charaCounts) . "</p>";

        echo "<ul>";
            foreach ($charaCounts as $chara => $count) {
         echo "<li>Character '" . $chara . "' occurs " . $count . " times.</li>";
    }
        echo "</ul>";
 ?>
 
</body>
</html>
