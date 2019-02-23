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

//Find the user's shipper_id
foreach ($db->query("SELECT id_shipper FROM shipper WHERE shipper_name = '$username'") as $row) {
    $shipperId = $row['id_shipper'];
}

//insert the shipment to the database
if ($shipperId != 0) {
    $statement = $db->prepare("INSERT INTO shipment (shipper_id_shipper, shipment_start_date, shipment_end_date)
                                VALUES(:shipperIdShipper, :shipmentStartDate, :shipmentEndDate);");
    $statement->bindValue(":shipperIdShipper", $shipperId, PDO::PARAM_STR);
    $statement->bindValue(":shipmentStartDate", $pickUpDate, PDO::PARAM_STR);
    $statement->bindValue(":shipmentEndDate", $dropOffDate, PDO::PARAM_STR);
    $statement->execute();
}

//Now we need to find the id of the shipment we just created
foreach ($db->query("SELECT id_shipment FROM shipment WHERE shipper_id_shipper = '$shipperId'") as $row) {
    $shipmentId = $row['id_shipment'];
}

//Now insert the pickup information.
if ($shipmentId != 0) {
    $statement = $db->prepare("INSERT INTO pickup_from (pickup_from_city, pickup_from_state, shipment_id_shipment)
                                VALUES(:pickupFromCity, :pickupFromState, :shipmentIdShipment);");
    $statement->bindValue(":pickupFromCity", $pickUpCity, PDO::PARAM_STR);
    $statement->bindValue(":pickupFromState", $pickUpState, PDO::PARAM_STR);
    $statement->bindValue(":shipmentIdShipment", $shipmentId, PDO::PARAM_STR);
    $statement->execute();

//Find the shimpment id again, I'm not entirely sure why but it won't run without this step
    foreach ($db->query("SELECT id_shipment FROM shipment WHERE shipper_id_shipper = '$shipperId'") as $row) {
        $shipmentId = $row['id_shipment'];
    }

//Insert the dropoff infomation.
    $statement = $db->prepare("INSERT INTO ship_to (ship_to_city, ship_to_state, shipment_id_shipment)
                                VALUES(:shipToCity, :shipToState, :shipmentIdShipment);");
    $statement->bindValue(":shipToCity", $dropOffCity, PDO::PARAM_STR);
    $statement->bindValue(":shipToState", $dropOffState, PDO::PARAM_STR);
    $statement->bindValue(":shipmentIdShipment", $shipmentId, PDO::PARAM_STR);
    $statement->execute();
}

//Send us to the next stop.
header("Location: tnbItemForm.php");
exit;
 