<?php
session_start();
require "dbConnect.php";
$db = get_db();
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
    <div class="row h-50">
        <div class="col-sm-2 col-lg-2">
            <img class=centered src="road.jpg" alt="you controling destiny">
        </div>
        <div class="col-sm-8 col-lg-8 center">
            
            <h2>Join the Best Thing to Happened in Trucking Since the Invention of the Diner</h2>
            <form action="tnbUserInsert.php" method="POST">

                <input type="text" name="shipper_name"><br>
                <label for="shipper-name">Username</label><br>
                <input type="password" name="shipper_password" pattern=".{8,}" required
                    title="8 characters minimum"><br>
                <label for="shipper-password">Password</label><br>
                <input type="submit" name="submit" class="btn btn-light" value="Submit">
                <?php
                if (!$_SESSION['userNameIsFree']) {
                    echo "<p id='signInError' class='text-danger'>That username is not availible, try another.</p>";
                } ?>
                <a href="tnbSignIn.php">Cancle</a>  
            </form>
        </div>
        <div class="col-sm-2 col-lg-2">
        </div>
    </div>

</body>

</html>