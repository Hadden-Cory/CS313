<?php
session_start();
require "dbConnect.php";
$db = get_db();


if ($_SESSION["verified"] == false) {
    session_destroy();
    header("Location: tnbSignIn.php");
    die();
}

//Shipment Table Varibles
$username = $_SESSION["username"];
$dropOffDate = $_SESSION["dropOffDate"];
$pickUpDate = $_SESSION["pickUpDate"];

//Pick Up Table Varibles
$pickUpState = $_SESSION["pickUpState"];
$pickUpCity = $_SESSION["pickUpCity"];

//Drop Off Table Varibles
$dropOffState = $_SESSION["dropOffState"];
$dropOffCity = $_SESSION["dropOffCity"];

//Size Table Varibles
$weight = $_SESSION["itemWeights"];
$width = $_SESSION["itemWidths"];
$height = $_SESSION["itemHeights"];
$depth = $_SESSION["itemDepths"];

//Drop Off Table Varibles
$itemName = $_SESSION["itemNames"];
$itemDescription = $_SESSION["itemDescriptions"];
$itemspecialInstructs = $_SESSION["itemspecialInstructs"];

//$ = $_SESSION[""];
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
    $statement->bindValue(":shipmentIdShipment", $shipmentId, PDO::PARAM_INT);
    $statement->execute();
}

foreach ($_SESSION['itemNames'] as $item => $values){

if($values != $_SESSION['itemDescriptions'][$item]){

    $statement = $db->prepare("INSERT INTO size (size_weight, size_width, size_height, size_depth)
    VALUES(:sizeWeight, :sizeWidth, :sizeHeight, :sizeDepth);");
    $statement->bindValue(":sizeWeight", $weight["$item"], PDO::PARAM_INT);
    $statement->bindValue(":sizeWidth", $width["$item"], PDO::PARAM_INT);
    $statement->bindValue(":sizeHeight", $height["$item"], PDO::PARAM_INT);
    $statement->bindValue(":sizeDepth", $depth["$item"], PDO::PARAM_INT);
    $statement->execute();
    
    $sizeId = 0;
    foreach ($db->query("SELECT id_size FROM size") as $row) {
        $sizeId = $row['id_size'];
    }

    $statement = $db->prepare("INSERT INTO item (item_name, item_description,
                                 item_spcl_instructs, size_id_size, shipment_id_shipment)
                               VALUES(:itemName, :itemDescription, :itemInstructs, :sizeId, :shipmentId);");
    $statement->bindValue(":itemName", $itemName["$item"], PDO::PARAM_STR);
    $statement->bindValue(":itemDescription", $itemDescription["$item"], PDO::PARAM_STR);
    $statement->bindValue(":itemInstructs", $itemspecialInstructs["$item"], PDO::PARAM_STR);
    $statement->bindValue(":sizeId", $sizeId, PDO::PARAM_INT);
    $statement->bindValue(":shipmentId", $shipmentId, PDO::PARAM_INT);
    $statement->execute();
}
}


$_SESSION["pickUpDate"] = NULL;
$_SESSION["pickUpState"] = NULL;
$_SESSION["pickUpCity"] = NULL;
$_SESSION["dropOffDate"] = NULL;
$_SESSION["dropOffState"] = NULL;
$_SESSION["dropOffCity"] = NULL;
$_SESSION['itemNames'] = NULL;
$_SESSION['itemDescriptions'] = NULL;
$_SESSION['itemWeights'] = NULL;
$_SESSION['itemWidths'] = NULL;
$_SESSION['itemHeights'] = NULL;
$_SESSION['itemDepths'] = NULL;
$_SESSION['itemspecialInstructs'] = NULL;

//Send us to the next stop.
header("Location: thereNBack.php");
exit;
 