<?php
    session_start();
?>
<html>

<head>
    <title>TotallyNotAScam.com</title>
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
    <?php include("header.php"); 
    ?>
    <Section>
        <div class="jumbotron">
            <h1>Welcome to Totally Not A Scam Wonderments For Internet</h1>
            <p>We have many amazing wonderments which you like very much, I think. You not get this anywhere
                else on
                internet or in shops or in grocery stores. We only have. Everything is half off for you,
                first customer.</p>
        </div>
        <div class="card-columns">
            <a href="gummys.php">
                <div class="card item">
                    <div class="card-body text-center">
                        <h3 class="card-title">Gummy Seeds</h3>
                    </div>
                    <img class="card-img-top" src="gummy.jpg" alt="Gummy Bears">
                </div>
            </a>
            <a href="cookies.php">
                <div class="card item">
                    <div class="card-body text-center">
                        <h3 class="card-title"> Cookie Chip</h3>
                    </div>
                    <img class="card-img-top" src="cookies.jpg" alt="Cookie">
                </div>
            </a>
            <a href="">
                <div class="card item">
                    <div class="card-body text-center">
                        <h3 class="card-title">Skittle Pill</h3>
                    </div>
                    <img class="card-img-top" src="skittles.jpg" alt="Skittles">
                </div>
            </a>
            <!-- <a class="col-md-3 card" href="">
                <h3>Gummy Bear Tree Seeds</h3>
                <img src="/week03ponder/GummyBear.jpg" alt="Gummy Bears">
            </a>
            <a class="col-md-3 card" href="">
                <h3>Gummy Bear Tree Seeds</h3>
                <img src="/week03ponder/GummyBear.jpg" alt="Gummy Bears">
            </a> -->


        </div>
    </Section>
</body>

</html>