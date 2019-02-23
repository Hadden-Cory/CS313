<?php
session_start();
require "dbConnect.php";
$db = get_db();

$_SESSION['itemNames'] = array();
$_SESSION['itemDescriptions'] = array();
$_SESSION['itemWeights'] = array();
$_SESSION['itemWidths'] = array();
$_SESSION['itemHeights'] = array();
$_SESSION['itemDepths'] = array();
$_SESSION['itemSpclInstructs'] = array(); 


if(!isset($_SESSION['itemNames'][$_POST["name"]])) {
    $_SESSION['itemNames'][$_POST["name"]] = $_POST["name"];
}
if(!isset($_SESSION['itemDescriptions'][$_POST["itemDescription"]])) {
    $_SESSION['itemDescriptions'][$_POST["itemDescription"]] = $_POST["itemDescription"];
}
if(!isset($_SESSION['itemWeights'][$_POST["weight"]])) {
    $_SESSION['itemWeights'][$_POST["weight"]] = $_POST["weight"];
}
if(!isset($_SESSION['itemWidths'][$_POST["width"]])) {
    $_SESSION['itemWidths'][$_POST["width"]] = $_POST["width"];
}
if(!isset($_SESSION['itemHeights'][$_POST["height"]])) {
    $_SESSION['itemHeights'][$_POST["height"]] = $_POST["height"];
}
if(!isset($_SESSION['itemDepths'][$_POST["depth"]])) {
    $_SESSION['itemDepths'][$_POST["depth"]] = $_POST["depth"];
}
if(!isset($_SESSION['itemSpclInstructs'][$_POST["specialInstructions"]])) {
    $_SESSION['itemSpclInstructs'][$_POST["specialInstructions"]] = $_POST["specialInstructions"];
}


// $_SESSION['itemCacheIndex'] = 0;
//     array_push($itemNames,'item'.$_SESSION['itemCacheIndex'], $_POST['name']);
//     array_push($itemDescriptions, 'description'.$_SESSION['itemCacheIndex'], $_POST['itemDescription']);
//     array_push($itemWeights, 'weights'.$_SESSION['itemCacheIndex'], $_POST['weight']);
//     array_push($itemWidths, 'widths'.$_SESSION['itemCacheIndex'], $_POST['width']);
//     array_push($itemHeights, 'heights'.$_SESSION['itemCacheIndex'], $_POST['height']);
//     array_push($itemDepths, 'depths'.$_SESSION['itemCacheIndex'], $_POST['depth']);
//     array_push($itemSpclInstructs, 'instructions'.$_SESSION['itemCacheIndex'], $_POST['specialInstructions']);
// // }
// // } catch (Exception $e) {
// //         echo 'Error. Details: '.$e->getMessage().'\n';
// //         die();
// // }
// //Load the shipment data into our session, we will insert
// // it into the database once we have the item information
// $_SESSION["itemNames"] = $itemNames; 
// $_SESSION["itemDescriptions "] = $itemDescriptions; 
// $_SESSION["itemWeights"] = $itemWeights;
// $_SESSION["itemWidths"] = $itemWidths;
// $_SESSION["itemHeights"] = $itemHeights;
// $_SESSION["itemDepths"] = $itemDepths;
// $_SESSION["itemSpclInstructs"] = $itemSpclInstructs;
//Send us to the next stop.
header("Location: tnbItemForm.php");
exit;


 
?>