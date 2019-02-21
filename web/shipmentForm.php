<?php

?>
<html>

<head>
    <title>ThereNBack.com-Shipment Form</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="plants.css">
    <link rel="stylesheet" type="text/css" href="tnb.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="tnb.js"></script>
</head>

<body>

<form action="userInsert.php" method="POST">
<label for="shipper-name">Username</label>
<input type="text" name="shipper_name">
<label for="shipper-password">Password</label>
<input type="password" name="shipper_password">
<input type="submit" name="submit" value="Submit">
</form>  
</html>