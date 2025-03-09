<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multiplication Table</title>
    
    <style>
        table {
            border-collapse: collapse;
            width: 50%;
            text-align: center;
        }

        td, th {
            border: 1.5px solid black;
            padding: 10px;
        }

        .even {
            background-color: lightgreen;
        }

    </style>
</head>

<body>

<table>
    <tr>
        <?php
        for ($number = 1; $number <= 10; $number++) {
            echo "<th>Table $number</th>";
        }
        ?>
    </tr>
    <?php

    for ($row = 1; $row <= 10; $row++) {
        echo "<tr>";
        for ($column = 1; $column <= 10; $column++) {
            $result = $row * $column;
            $class = ($result % 2 == 0) ? "even" : ""; //apply "even" class for even numbers
            echo "<td class='$class'>$result</td>";
        }
        echo "</tr>";
    }
    ?>
</table>

</body>
</html>
