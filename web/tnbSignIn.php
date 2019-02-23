<?php
    session_start();
?>

<html>

<head>
    <title>ThereNBack.com-Sign In</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="plants.css">
    <link rel="stylesheet" type="text/css" href="tnb.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="tnb.js"></script>
</head>
  
<body>
<?php
    include("header.php");
    if ($_session['lastAttemptFail']){
        echo "<p id='signInError'>Login Failed: password or username were incorrect.</p>";
    }
?>
    <form action="tnbVerifyUser.php" method="POST">
        <label for="shipper-name">Username</label>
        <input type="text" name="shipper_name">
        <label for="shipper-password">Password</label>
        <input type="password" name="shipper_password">
        <input type="submit" name="submit" value="Submit">
    </form>
    <p>Not a member? Sign up <a href="addingUser.php">here</a></p>
</body>

</html>