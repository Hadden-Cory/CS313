<?php
session_start();
if ($_SESSION["verified"] == false) {
    session_destroy();
    header("Location: tnbSignIn.php");
    die();
}
?>
<html>

<head>
    <title>ThereNBack.com-Bid Form</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="plants.css">
    <link rel="stylesheet" type="text/css" href="tnb.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="tnb.js"></script>
</head>

<body>
    <?php include("header.php"); ?>
    <div id="container" class="center">
        <div class="row h-50">
            <div class="col-sm-2 col-lg-2">
            </div>
            <div class="col-sm-8 col-lg-8"><br><br><br>

                <a href='thereNBack.php'>Cancle</a>
                <form class="center" action="tnbBidInsert.php" method="POST">

                    <input type="number" name="price" min="0.00" step="any" required><br>
                    <label for="price">Charge</label><br>
                    
                    <input type="date" name="pickUpDate" required><br>
                    <label for="pickUpDate">Pickup Date</label><br>
                    <input type="date" name="dropOffDate" required><br>
                    <label for="dropOffDate">Drop off Date</label><br>
                    
                    <input type="number" min="1000000000" max="9999999999" step="1" name="phone" required><br>
                    <textarea rows="4" cols="50" name="specialInstructions" required>N/A</textarea><br>
                    <label for="spclInstructs">Special Instructions</label><br>
                    
                    <?php echo '<input type="text" class="collaspe" name="shipmentId" value="' . $_POST['shipmentId'] . '">'; ?>
                    <input type="submit" class="btn btn-light" value="Send Offer">
                </form>
            </div>
            <div class="col-sm-2 col-lg-2">
            </div>
        </div>
    </div>
</body>

</html> 