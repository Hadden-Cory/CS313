<?php
session_start();
require "dbConnect.php";
$db = get_db();

$itemNames = array();
$itemDescriptions = array();
$itemWeights = array();
$itemWidths = array();
$itemHeights = array();
$itemDepths = array();
$itemSpclInstructs = array(); 

// try{
// if(!isset($_SESSION["itemNames "])){
//     $itemNames = array($_POST['name']);
//     $itemDescriptions = array($_POST['itemDescription']);
//     $itemWeights = array($_POST['weight']);
//     $itemWidths = array($_POST['width']);
//     $itemHeights = array($_POST['height']);
//     $itemDepths = array($_POST['depth']);
//     $itemSpclInstructs=[$_POST['specialInstructions']]); 
// } else {
$_SESSION['itemCacheIndex'] = 0;
    array_push( $itemNames,'item'.$_SESSION['itemCacheIndex'], $_POST['name']);
    array_push($itemDescriptions, 'description'.$_SESSION['itemCacheIndex'], $_POST['itemDescription']);
    array_push($itemWeights, 'weights'.$_SESSION['itemCacheIndex'],$_POST['weight']);
    array_push($itemWidths, 'widths'.$_SESSION['itemCacheIndex'],$_POST['width']);
    array_push($itemHeights, 'heights'.$_SESSION['itemCacheIndex'],$_POST['height']);
    array_push($itemDepths, 'depths'.$_SESSION['itemCacheIndex'],$_POST['depth']);
    array_push($itemSpclInstructs, 'instructions'.$_SESSION['itemCacheIndex'],$_POST['specialInstructions']);
// }
// } catch (Exception $e) {
//         echo 'Error. Details: '.$e->getMessage().'\n';
//         die();
// }
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