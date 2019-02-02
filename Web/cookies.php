<?php
session_start();
?>
<html>

<head>
    <title>TotallyNotAScam.com-Cookies</title>
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
    <?php include("header.php"); ?>
    <Section>
        <div class="row">
            <div class="col-12">
                <div class="jumbotron">
                    <h1>High Tech computer Chip that Makes Cookies</h1><br>
                    <p>This is high tech very expensive cookie making computer chip. It works really really good. You
                        love the cookies. Easy to plug in to computer, and also very cheap for you. Two left only. Must
                        buy quickly.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <img src="/week03ponder/chip.jpg" class="img-fluid img-thumbnail mx-auto d-block" alt="Computer Chip">
            </div>
            <div class="col-4">
                <div class="jumbotron">
                    <h1>Order Now<h1><br>
                            <form action="" method="post">
                                <div class="form-group">
                                    <select placeholder="How Many?" name="cookieQuantity" class="form-control"
                                        id="quantity">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                    </select><br>
                                    <button type="submit" class="btn-lg btn-info">Order</button>
                                    <?php 
                                    if ($_SESSION['cookies'] > 2) {
                                        $_SESSION['cookies'] = 0;
                                    } else {
                                        $_SESSION['cookies'] = $_SESSION['cookies'] + $_POST['cookieQuantity'];
                                    } ?>
                                    <a href="cart.php">view cart</a>
                                </div>
                            </form>
                </div>
            </div>
            <div class="col-4">
                <img src="/week03ponder/cookies.jpg" class="img-fluid img-thumbnail mx-auto d-block" alt="Cookies">
            </div>
        </div>
    </Section>
</body>

</html>