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
    <a href='thereNBack.php'>Cancle</a>
    <form action="tnbBidInsert.php" method="POST">
        <label for="price">Charge</label>
        <input type="number" name="price" min="0.00" step="any" required><br>
        <label for="pickUpDate">Pickup Date</label>
        <input type="date" name="pickUpDate" required>
        <label for="dropOffDate">Drop off Date</label>
        <input type="date" name="dropOffDate" required>
        <label for="phone">10-Digit Phone Number</label>
        <input type="number" min="1000000000" max="9999999999" step="1" name="pickUpDate" required>
        <label for="spclInstructs">Special Instructions</label>
        <textarea rows="4" cols="50" name="specialInstructions" required>N/A</textarea>
        <input type="text" name="shipmentId" value="<?php echo $_POST['shipmentId']?>">
        <input type="submit" value="Send Offer">
    </form>
</body>

</html> 