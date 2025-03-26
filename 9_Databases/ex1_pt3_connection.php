<?php
// Connecting to the database
try {
    $db = new PDO('sqlite:chinook.sqlite');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

$tableName = isset($_GET['table']) ? trim($_GET['table']) : '';
$columns = [];
$error = '';

if ($tableName) {
    try {
        //get column names
        $stmt = $db->query("PRAGMA table_info($tableName)");
        $columns = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (empty($columns)) {
            $error = "No results found. The table '$tableName' does not exist.";
        }
    } catch (PDOException $e) {
        $error = "Invalid table name.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Table Columns</title>
</head>
<body>

<h2>List the columns of a specific table</h2>

<form method="GET">
    <input type="text" name="table" value="<?= ($tableName) ?>" placeholder="Enter table name">
    <button type="submit">Search</button>
</form>

<?php if ($tableName): ?>
    <h3>Result:</h3>
    <?php if ($error): ?>
        <p><?= ($error) ?></p>
    <?php else: ?>
        <ul>
            <?php foreach ($columns as $column): ?>
                <li><?= ($column['name']) ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
<?php endif; ?>

</body>
</html>
