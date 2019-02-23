<?php
session_start();
require "dbConnect.php";
$db = get_db();
try{
if(!isset($_SESSION["itemNames "])){
    $itemNames = array($_POST['name']);
    $itemDescriptions = array($_POST['itemDescription']);
    $itemWeights = array($_POST['weight']);
    $itemWidths = array($_POST['width']);
    $itemHeights = array($_POST['height']);
    $itemDepths = array($_POST['depth']);
    $itemSpclInstructs = array($_POST['specialInstructions']); 
} else {
    array_push($itemNames, $_POST['name']);
    array_push($itemDescriptions, $_POST['itemDescription']);
    array_push($itemWeights, $_POST['weight']);
    array_push($itemWidths, $_POST['width']);
    array_push($itemHeights, $_POST['height']);
    array_push($itemDepths, $_POST['depth']);
    array_push($itemSpclInstructs, $_POST['specialInstructions']);
}
} catch (Exception $e) {
        echo 'Error. Details: '.$e->getMessage().'\n';
        die();
}
//Load the shipment data into our session, we will insert
// it into the database once we have the item information
$_SESSION["itemNames"] = $itemNames; 
$_SESSION["itemDescriptions "] = $itemDescriptions; 
$_SESSION["itemWeights"] = $itemWeights;
$_SESSION["itemWidths"] = $itemWidths;
$_SESSION["itemHeights"] = $itemHeights;
$_SESSION["itemDepths"] = $itemDepths;
$_SESSION["itemSpclInstructs"] = $itemSpclInstructs;
//Send us to the next stop.
header("Location: tnbItemForm.php");
exit;
 
?>