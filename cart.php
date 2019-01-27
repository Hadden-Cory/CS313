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
    $_SESSION["gummys"] = 4;
    $_SESSION["cookies"] = 3;
    $_SESSION["skittles"] = 2;

    include("header.php");

    function removal($sessionData, $removal)
    {
        if ($removal > $sessionData) {
            $sessionData = 0;
        } else {
            $sessionData = $sessionData - $removal;
        }
    }

    function genDrop($sessionData, $name)
    {
        print($sessionData);
        echo $sessionData . "<select name='" . $name . "Removal' class='form-control'>";
        for ($i = 0; $i < $sessionData; $i++) {
            $sessionData = 0;
            echo "<option value='" . $i . "'>" . $i . "</option>";
        }
    }
    ?>
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
                    <div class="form-group">
                        <div class="row">
                            <div class="col-6">
                                <h3><?php echo $_SESSION["gummys"]; ?> Gummy Seeds</h3>
                            </div>
                            <div class="col-3">
                                <?php
                                genDrop($_SESSION["gummys"], "gummy");
                                ?><br>
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

                                </select><br>
                            </div>
                            <div class="col-3">
                                <button type="submit" class="btn-lg btn-info">Remove</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <h3>
                                    <?php echo $_SESSION["skittles"];
                                    ?></h3>
                                Skittle Pills</h3>
                            </div>
                            <div class="col-3">
                                <?php
                                genDrop($_SESSION["skittles"], "skittles");
                                ?>
                                <br>
                            </div>
                            <div class="col-3">
                                <button type="submit" class="btn-lg btn-info">Remove</button>
                            </div>
                        </div>
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