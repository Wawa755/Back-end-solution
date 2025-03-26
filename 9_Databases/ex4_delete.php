<?php
    try {
        $db = new PDO("sqlite:back-end-users-exercise.db");
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if (isset($_POST['delete'])) {
            $userId = $_POST['user_id'];

            // delete query
            $deleteUserQuery = "DELETE FROM Users WHERE id = :id";
            $deleteUserStatement = $db->prepare($deleteUserQuery);
            $deleteUserStatement->bindParam(':id', $userId);
            $deleteUserStatement->execute();

            // Redirect back to the same page after deletion
            header("Location: ex4_delete.php");
            exit;
        }

        // Fetch all users
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
    <title>User Dashboard</title>

    <script>
        function confirmDelete(userId, username) {
            const confirmation = confirm(`You are about to delete "${username}" (id: ${userId}). Are you sure?`);
            if (confirmation) {
                // If confirmed, set the user_id and submit the form
                document.getElementById('deleteForm').elements['user_id'].value = userId;
                document.getElementById('deleteForm').submit();
            }
        }
    </script>
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
                <td><?= htmlspecialchars($user['Username']) ?></td>
                <td><?= htmlspecialchars($user['Password']) ?></td>
                <td>
                    <button type="button" onclick="confirmDelete(<?= $user['id'] ?>, '<?= htmlspecialchars($user['Username']) ?>')">[x] Delete</button>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <!-- Hidden form for deleting a user -->
    <form id="deleteForm" method="POST" style="display: none;">
        <input type="hidden" name="user_id" value="">
        <input type="submit" name="delete" value="Delete">
    </form>

</body>
</html>
