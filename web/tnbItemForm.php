<?php

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
    echo $_SESSION['itemNames'][0];
    ?>

    <form name="item" method="POST" action="tnbItemCache.php">
        <label for="name">What is your item?</label>
        <input type="text" name="name"><br>
        <label for="itemDescription">If applicatble, add a description.</label>
        <textarea rows="4" cols="50" name="itemDescription"></textarea><br>
        <label for="weight">Enter the weight in pounds.</label>
        <input type="number" name="weight"><br>
        <label for="width">Enter the width in inches.</label>
        <input type="number" name="width"><br>
        <label for="height">Enter the height in inches.</label>
        <input type="number" name="height"><br>
        <label for="depth">Enter the depth in inches.</label>
        <input type="number" name="depth"><br><br>
        <label for="specialInstructions">Any special instructions?</label>
        <textarea rows="4" cols="50" name="specialInstructions"></textarea><br>
        <input type="submit" name="submit" value="Add Item">
    </form>
</body>

</html> 