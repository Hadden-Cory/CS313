<?php
session_start();
require "dbConnect.php";
$db = get_db();

if ($_SESSION["verified"] == false) {
    session_destroy();
    header("Location: tnbSignIn.php");
    die();
}
?>  

<html>

<head>
    <title>ThereNBack.com-Sign Up</title>
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
    ?>
    <a href="thereNBack.php">Cancle</a>
    <h1>Join the best thing that ever happened to trucking since the invention of the diner</h1>
    <form action="tnbUserInsert.php" method="POST">
        <label for="shipper-name">Username</label>
        <input type="text" name="shipper_name"><br>
        <label for="shipper-password">Password</label>
        <input type="password" name="shipper_password" pattern=".{8,}"   required title="8 characters minimum">
        <input type="submit" name="submit" class="btn btn-light" value="Submit">
        <?php
        if (!$_SESSION['userNameIsFree']) {
            echo "<p id='signInError' class='text-danger'>That username is not availible, try another.</p>";
            } ?>
    </form>
</body>

</html> 