<?php
    try {
        $db = new PDO("sqlite:back-end-users-exercise.db");
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //checking for updates
        if (isset($_POST['update'])) {
            $userId = $_POST['id'];
            $username = $_POST['Username'];
            $password = $_POST['Password'];

            //update
            $updateUserQuery = "UPDATE Users SET Username = :Username, Password = :Password WHERE id = :id";
            $updateUserStatement = $db->prepare($updateUserQuery);
            $updateUserStatement->bindParam(':id', $userId);
            $updateUserStatement->bindParam(':Username', $username);
            $updateUserStatement->bindParam(':Password', $password);
            $updateUserStatement->execute();
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
    <title>Update database</title>
</head>
<body>

    <h1>User Dashboard</h1>
    <h2>Manage Users</h2>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Password</th>
            <th>Action</th>
        </tr>

        <?php foreach ($users as $user): ?>
            <tr>
                <form action="ex5_update.php" method="POST">
                    <input type="hidden" name="id" value="<?= $user['id'] ?>">
                    <td>
                        <?= $user['id'] ?>
                    </td>

                    <td>
                        <input type="text" name="Username" value="<?= ($user['Username']) ?>" required>
                    </td>

                    <td>
                        <input type="text" name="Password" value="<?= ($user['Password']) ?>" required>
                    </td>

                    <td>
                        <button type="submit" name="update">Update</button>
                    </td>
                </form>
            </tr>
        <?php endforeach; ?>
    </table>

</body>
</html>
