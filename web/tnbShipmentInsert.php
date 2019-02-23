<?php
session_start();
require "dbConnect.php";
$db = get_db();

$username = $_SESSION["username"];
$pickUpDate = $_POST["pickUpDate"];
$pickUpState = $_POST["pickUpState"];
$pickUpCity = $_POST["pickUpCity"];
$dropOffDate = $_POST["dropOffDate"];
$dropOffState = $_POST["dropOffState"];
$dropOffCity = $_POST["dropOffCity"];
$shipperId = 0;
$shipmentId = 0;


foreach ($db->query("SELECT id_shipper FROM shipper WHERE shipper_name = '$username'") as $row) {
    $shipperId = $row['id_shipper'];
}

if ($shipperId != 0) {
    $statement = $db->prepare("INSERT INTO shipment (shipper_id_shipper, shipment_start_date, shipment_end_date)
                                VALUES(:shipperIdShipper, :shipmentStartDate, :shipmentEndDate);");
    $statement->bindValue(":shipperIdShipper", $shipperId, PDO::PARAM_STR);
    $statement->bindValue(":shipmentStartDate", $pickUpDate, PDO::PARAM_STR);
    $statement->bindValue(":shipmentEndDate", $dropOffDate, PDO::PARAM_STR);
    $statement->execute();
}

foreach ($db->query("SELECT id_shipment FROM shipment WHERE shipper_id_shipper = '$username'") as $row) {
    $shipmentId = $row['id_shipment'];
}

if ($shipmentId != 0) {
    $statement = $db->prepare("INSERT INTO pickup_from (pickup_from_city, pickup_from_state, shipment_id_shipment)
                                VALUES(:pickupFromCity, :pickupFromState, :shipmentIdShipment);");
    $statement->bindValue(":pickupFromCity", $pickUpCity, PDO::PARAM_STR);
    $statement->bindValue(":pickupFromState", $pickUpState, PDO::PARAM_STR);
    $statement->bindValue(":shipmentIdShipment", $shipmentId, PDO::PARAM_STR);
    $statement->execute();

    $statement = $db->prepare("INSERT INTO ship_to (ship_to_city, ship_to_state, shipment_id_shipment)
                                VALUES(:shipToCity, :shipToState, :shipmentIdShipment);");
    $statement->bindValue(":shipToCity", $dropOffCity, PDO::PARAM_STR);
    $statement->bindValue(":shipToState", $dropOffState, PDO::PARAM_STR);
    $statement->bindValue(":shipmentIdShipment", $shipmentId, PDO::PARAM_STR);
    $statement->execute();
}

header("Location: construction.php");
exit;
 