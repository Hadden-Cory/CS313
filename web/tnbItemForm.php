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

    <title>ThereNBack.com-Item Form</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="plants.css">
    <link rel="stylesheet" type="text/css" href="tnb.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="tnb.js"></script>
</head>

<body>
    <?php include("header.php");

    echo "    <div id='container class='center'>
    <div class='row h-50'>
        <div class='col-sm-2 col-lg-2'>
        </div>
        <div class='col-sm-8 col-lg-8'>
        <a href='thereNBack.php'>Cancle</a><table>
            <tr>
                <th>Pickup As Early As </th>
                <th>Pickup State</th>
                <th>Pickup City</th>
                <th>Deliver by</th>
                <th>Delivery State</th>
                <th>Delivery City</th>
            </tr>";
    echo "<tr><td>" . $_SESSION['pickUpDate'] . "</td>";
    echo "<td>" . $_SESSION['pickUpState'] . "</td>";
    echo "<td>" . $_SESSION['pickUpCity'] . "</td>";
    echo "<td>" . $_SESSION['dropOffDate'] . "</td>";
    echo "<td>" . $_SESSION['dropOffState'] . "</td>";
    echo "<td>" . $_SESSION['dropOffCity'] . "</td></tr>";
    echo "</table>"; ?>

    <form name="item" method="POST" action="tnbItemCache.php">
   
        <input type="text" name="name" required><br>
        <label for="name">What is your item?</label><br>
        
        <textarea rows="4" cols="50" name="itemDescription" required>N/A</textarea><br>
        <label for="itemDescription">If applicatble, add a description.</label><br>
        
        <input type="number" name="weight" required><br>   
        <label for="weight">Enter the weight in pounds.</label><br>
        <input type="number" name="width" required><br>
        <label for="width">Enter the width in inches.</label><br>
        
        <input type="number" name="height" required><br>
        <label for="height">Enter the height in inches.</label><br>
         <input type="number" name="depth" required><br>
        <label for="depth">Enter the depth in inches.</label><br>
        <textarea rows="4" cols="50" name="specialInstructions" required>N/A</textarea><br>
        <label for="specialInstructions">Any special instructions? If none type N/A</label><br>
        
        <input type="submit" class="btn btn-light" name="submit" value="Add Item">
    </form>
    </div>
    <div class="col-sm-2 col-lg-2">
    </div>
    </div>
    </div>
    </div>
</body>

</html> 