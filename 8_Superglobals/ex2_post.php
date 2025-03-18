<?php
$correctPassword = '1234';
$correctUsername = 'Starman';

$message = '';

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === $correctUsername && $password === $correctPassword) {
        $message = 'Welcome!';
    } else {
        $message = 'There was an error logging in, please try again';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
</head>
<body>

    <h1>Login</h1>

    <div>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
           
            <div>
                <label for="password">Password:</label>
               <div>
                    <input type="password" id="password" name="password">
               </div> 
            </div>

            <div>
                <label for="username">Username:</label>
                <div>
                    <input type="text" id="username" name="username">
                </div>
            </div>

            <div>
                <input type="submit" value="Submit query">
            </div>        
        </form>
    </div>

    <?php if ($message !== '') : ?>
        <p><?php echo $message; ?></p>
    <?php endif; ?>


    <style>

        *{
            font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;
        }

        div{
            margin: 10px;
        }
    </style>
</body>
</html>