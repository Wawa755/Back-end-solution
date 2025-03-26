<?php
    try {
        $db = new PDO("sqlite:back-end-users-exercise.db");
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if (isset($_POST['submit'])) {
            $username = trim($_POST['username']);
            $password = trim($_POST['password']);
            $errorMessages = [];

            if (empty($username)) {
                $errorMessages[] = "Username cannot be empty.";
            } else {
                //check if username exists
                $checkUsernameQuery = "SELECT COUNT(*) FROM Users WHERE Username = :Username";
                $checkUsernameStatement = $db->prepare($checkUsernameQuery);
                $checkUsernameStatement->bindParam(':Username', $username);
                $checkUsernameStatement->execute();
                $usernameExists = $checkUsernameStatement->fetchColumn();

                if ($usernameExists > 0) {
                    $errorMessages[] = "Username already exists!";
                }
            }

            //check password
            if (empty($password)) {
                $errorMessages[] = "Password can't be empty!!";
            } elseif (strlen($password) < 8) {
                $errorMessages[] = "Password must be at least 8 characters long!!!";
            } elseif (!preg_match('/[!?@_]/', $password)) {
                $errorMessages[] = "Password must contain at least one special character (!, ?, @, or _)!!";
            }

            //if no eror
            if (empty($errorMessages)) {
                $insertUserQuery = "INSERT INTO Users (Username, Password) VALUES (:Username, :Password)";
                $insertUserStatement = $db->prepare($insertUserQuery);
                $insertUserStatement->bindParam(':Username', $username);
                $insertUserStatement->bindParam(':Password', password_hash($password, PASSWORD_DEFAULT));
                $insertUserStatement->execute();

                $successMessage = "You've registered successfully!!!";
            }
        }
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
    <title>Add database</title>
</head>
<body>

    <h1>Register User</h1>

    <!-- message -->
    <?php if (isset($successMessage)): ?>
        <p style="color: green;"><?php echo $successMessage; ?></p>
    <?php endif; ?>

    <?php if (isset($errorMessages) && !empty($errorMessages)): ?>
        <ul style="color: red;">
            <?php foreach ($errorMessages as $error): ?>
                <li><?php echo $error; ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <form action="ex3_add.php" method="POST">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" value="<?= isset($_POST['username']) ? htmlspecialchars($_POST['username']) : '' ?>" required><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>

        <button type="submit" name="submit">Register</button>
    </form>

</body>
</html>
