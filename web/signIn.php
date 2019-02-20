<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up</title>
</head>

<body>
    <form action="verifyUser.php" method="POST">
        <label for="shipper-name">Username</label>
        <input type="text" name="shipper_name">
        <label for="shipper-password">Password</label>
        <input type="password" name="shipper_password">
        <input type="submit" name="submit" value="Submit">
    </form>
    <p>Not a member? Sign up <a href="addingUser.php">here</a></p>
</body>

</html>