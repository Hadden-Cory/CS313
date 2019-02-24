<?php
session_start();
require "dbConnect.php";
$db = get_db();

if ($_SESSION["verified"] == false) {
    session_destroy();
    header("Location: tnbSignIn.php");
    die();
}

$shipmentId = $_POST['shipmentId'];

$statement = $db->prepare("DELETE FROM bid WHERE shipment_id_shipment ='$shipmentId'");
$statement->execute(); 

$statement = $db->prepare("DELETE FROM item WHERE shipment_id_shipment ='$shipmentId'");
$statement->execute(); 

$statement = $db->prepare("DELETE FROM ship_to WHERE shipment_id_shipment ='$shipmentId'");
$statement->execute(); 

$statement = $db->prepare("DELETE FROM pickup_from WHERE shipment_id_shipment ='$shipmentId'");
$statement->execute(); 

$statement = $db->prepare("DELETE FROM bid WHERE id_shipment ='$shipmentId'");
$statement->execute(); 

header("Location: tnbShipmentEdit.php");
exit; 