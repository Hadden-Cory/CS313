<?php
session_start();
?>
<html>

<head>
    <title>TotallyNotAScam.com-Cart</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="plants.css">
    <link rel="stylesheet" type="text/css" href="scam.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="plants.js"></script>
    <script src="scam.js"></script>
</head>

<body>
    <?php
$_SESSION["gummys"] = $_POST["gummyQuantity"];
$_SESSION["cookies"] = 0;
$_SESSION["skittles"] = 0;
print_r($_SESSION);
?>
    <?php include("header.php"); ?>
    <Section>
        <div class="row">
            <div class="col-12">
                <div class="jumbotron">
                    <h1>Cart</h1><br>


                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <img src="/week03ponder/secure.jpeg" class="img-fluid img-thumbnail mx-auto d-block" alt="Seeds">
            </div>
            <div class="col-4">
                <div class="jumbotron">
                    <h3><?php echo $_SESSION["gummys"]; ?> Gummy Seed Packs</h3>
                    <h3><?php echo $_POST["cookies"]; ?> Cookies Chips</h3>
                    <h3><?php echo $_POST["skittle"]; ?> Skittle Pills</h3>
                </div>
            </div>
            <div class="col-4">
                <img src="/week03ponder/money.jpeg" class="img-fluid img-thumbnail mx-auto d-block" alt="Gummy Bears">
            </div>
        </div>
    </Section>
</body>

</html>