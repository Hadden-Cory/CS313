<?php
session_start();

if ($_SESSION["verified"] == false) {
    session_destroy();
    header("Location: tnbSignIn.php");
    die();
}

//Load the shipment data into our session, we will insert
// it into the database once we have the item information
$username = $_SESSION["username"];
$_SESSION["pickUpDate"] = $_POST["pickUpDate"];
$_SESSION["pickUpState"] = $_POST["pickUpState"];
$_SESSION["pickUpCity"] = $_POST["pickUpCity"];
$_SESSION["dropOffDate"] = $_POST["dropOffDate"];
$_SESSION["dropOffState"] = $_POST["dropOffState"];
$_SESSION["dropOffCity"] = $_POST["dropOffCity"];

//Send us to the next stop.
header("Location: tnbItemForm.php");
exit;
 
?>