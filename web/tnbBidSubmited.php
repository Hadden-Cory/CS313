<?php
session_start();
require("dbConnect.php");
$db = get_db();
?>
<html>

<head>
    <title>ThereNBack.com-Shipment Details</title>
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

            if ($_SESSION["verified"] == false) {
                session_destroy();
                header("Location: tnbSignIn.php");
                die();
            }
        ?>
    <h1>Your Bid Has Been Sent</h1>
    <a href='thereNBack.php'>Return to the Home Screen</a>