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
$price = $_POST['price'];
$startDate = $_POST['pickUpDate'];
$endDate = $_POST['dropOffDate'];
$phone = $_POST['phone'];
$spclInstructs = $_POST['spclInstructs'];

$statement = $db->prepare("INSERT INTO bid (bid_price, bid_stat_date, bid_end_date,
                                             bid_contact_number, bid_spcl_instruct, shipment_id_shipment)
                           VALUES (:price, :bStart, :bEnd, :phone, :spcl, :shipId)");
$statement->bindValue(":price", $price, PDO::PARAM_STR);
$statement->bindValue(":bStart", $startDate, PDO::PARAM_STR);
$statement->bindValue(":bEnd", $endDate, PDO::PARAM_STR);
$statement->bindValue(":phone", $phone, PDO::PARAM_STR);
$statement->bindValue(":spcl", $spclInstructs, PDO::PARAM_STR);
$statement->bindValue(":shipId", $shipmentId, PDO::PARAM_STR);
$statement->execute(); 

header("Location: tnbBidSubmited.php");
exit;