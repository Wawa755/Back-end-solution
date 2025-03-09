<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
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
        $number = 1;
        while ($number <= 10) {
            echo "<th>Table $number</th>";
            $number++;
        }
        ?>
    </tr>

    <?php
    $row = 1;
    while ($row <= 10) {
        echo "<tr>";
        $column = 1;
        while ($column <= 10) {
            $result = $row * $column;
            $class = ($result % 2 == 0) ? "even" : ""; //applying "even" class if the number is even
            echo "<td class='$class'>$result</td>";
            $column++;
        }
        echo "</tr>";
        $row++;
    }
    ?>
</table>

</body>
</html>
