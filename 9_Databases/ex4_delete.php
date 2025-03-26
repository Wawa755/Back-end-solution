<?php
    try {
        $db = new PDO("sqlite:back-end-users-exercise.db");
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if (isset($_GET['id'])) {
            $userId = $_GET['id'];

            // delete query
            $deleteUserQuery = "DELETE FROM Users WHERE id = :id";
            $deleteUserStatement = $db->prepare($deleteUserQuery);
            $deleteUserStatement->bindParam(':id', $userId);
            $deleteUserStatement->execute();

            //refresh after delete
            header("Location: ex4_delete.php");
            exit;
        }

        $usersQuery = "SELECT * FROM Users";
        $users = $db->query($usersQuery)->fetchAll(PDO::FETCH_ASSOC);

        $db = null;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Delete database</title>
</head>
<body>

    <h1>User Dashboard</h1>

    <h2>User Overview</h2>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Password</th>
            <th>Action</th>
        </tr>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?= $user['id'] ?></td>
                <td><?= ($user['Username']) ?></td>
                <td><?= ($user['Password']) ?></td>
                <td>
                    <a href="ex4_delete.php?id=<?= $user['id'] ?>" onclick="return confirm('You are about to delete &quot;<?=  ($user['Username']) ?>&quot; (id: <?= $user['id'] ?>). Are you sure?')">[x] Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

</body>
</html>