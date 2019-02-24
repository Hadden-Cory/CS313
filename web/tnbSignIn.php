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
    ?>
    <div id="container" class="center">
        <div class="row h-50">
            <div class="col-sm-2 col-lg-2">
            <img class=centered src="destiny.jpg" alt="you controling destiny">
            </div>
            <div class="col-sm-8 col-lg-8 center"><br><br>
            <h1 class="center">ThereNBack.com</h1>
1>            <h2 class="center">One step away from controling your destiny...</h2><br>
                <form class="center" action="tnbVerifyUser.php" method="POST">
                    <label for="shipper-name">Username</label>
                    <input type="text" name="shipper_name"><br>
                    <label for="shipper-password"> Password </label>
                    <input type="password" name="shipper_password">
                    <input type="submit" class="btn btn-light" name="submit" value="Submit">
                    <?php
                        if ($_SESSION['lastAttemptFailed']) {
                            echo "<p id='signInError' class='text-danger'>Login Failed: password or username were incorrect.</p>";
                            } ?>
                </form>
                <p>Not a member? Sign up <a href="tnbSignUp.php">here</a></p>
            </div>
            <div class="col-sm-2 col-lg-2">
            </div>
        </div>
    </div>

</body>

</html>