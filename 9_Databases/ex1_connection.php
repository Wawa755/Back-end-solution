<?php
//connecting database and checking connnection
try {
    $db = new PDO('sqlite:chinook.sqlite');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $artists = $db->query("SELECT * FROM artists")->fetchAll(PDO::FETCH_ASSOC);
    $customers = $db->query("SELECT * FROM customers")->fetchAll(PDO::FETCH_ASSOC);

    $db = null;


} catch (PDOException $e) {
    echo "Database connection failed: " . $e->getMessage();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artists List</title>
</head>
<body>

<h2>Getting all artists from the database</h2>

<table>
    <tr><th>Artists</th></tr>
    <?php foreach ($artists as $artist): ?>
    <tr>
        <td>
            <?= ($artist['Name']) ?>
        </td>
    </tr>
    <?php endforeach; ?>
</table>


<h2>Getting all customers from the database</h2>

<table>
    <tr><th>Customers</th></tr>
    <?php foreach ($customers as $customer): ?>
    <tr>
        <td>
        <?= ($customer['FirstName']) ?> <?= ($customer['LastName']) ?>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<style>
    table, td{
        border: 1px solid;
    }
</style>
</body>
</html>