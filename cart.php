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
    $_SESSION["gummys"] = $_SESSION["gummy"] + $_POST["gummyQuantity"];
    $_SESSION["skittles"] = 0;
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
                    <form action="" method="post">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-6">
                                    <h3><?php echo $_SESSION["gummys"]; ?> Gummy Seeds</h3>
                                </div>
                                <div class="col-3">
                                    <select name="gummyRemove" class="form-control">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                    </select><br>
                                </div>
                                <div class="col-3">
                                    <button type="submit" class="btn-lg btn-info">Remove</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <h3><?php echo $_SESSION["cookies"]; ?> Cookies Chips</h3>
                                </div>
                                <div class="col-3">
                                    <select name="cookieRemove" class="form-control">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                    </select><br>
                                </div>
                                <div class="col-3">
                                    <button type="submit" class="btn-lg btn-info">Remove</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <h3><?php echo $_SESSION["skittles"]; ?> Skittle Pills</h3>
                                </div>
                                <div class="col-3">
                                    <select name="skittleRemove" class="form-control">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                    </select><br>
                                </div>
                                <div class="col-3">
                                    <button type="submit" class="btn-lg btn-info">Remove</button>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-4">
            <img src="/week03ponder/money.jpeg" class="img-fluid img-thumbnail mx-auto d-block" alt="Gummy Bears">
        </div>
        </div>
    </Section>
</body>

</html>