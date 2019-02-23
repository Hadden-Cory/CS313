<?php
session_start();
require "dbConnect.php";
$db = get_db();

if (!isset($_SESSION['itemNames']))
{
    $_SESSION['itemNames'] = array();
    $_SESSION['itemDescriptions'] = array();
    $_SESSION['itemWeights'] = array();
    $_SESSION['itemWidths'] = array();
    $_SESSION['itemHeights'] = array();
    $_SESSION['itemDepths'] = array();
    $_SESSION['itemspecialInstructs'] = array();
}

try{
// if(!isset($_SESSION['itemNames'][$_POST["name"]]) && $_SESSION['itemNames'][$_POST["name"]] != NULL)  {
    array_push($_SESSION['itemNames'], $_POST["name"], $_POST["name"]);
    array_push($_SESSION['itemDescriptions'], $_POST["name"], $_POST["itemDescription"]);
    array_push($_SESSION['itemWeights'], $_POST["name"], $_POST["weight"]);
    array_push($_SESSION['itemWidths'], $_POST["name"], $_POST["width"]);
    array_push($_SESSION['itemHeights'], $_POST["name"], $_POST["height"]);
    array_push($_SESSION['itemDepths'], $_POST["name"], $_POST["depth"]);
    array_push($_SESSION['itemspecialInstructs'], $_POST["name"], $_POST["specialInstructions"]);
//}
} catch (Exception $e) {
            echo 'Error. Details: '.$e->getMessage().'\n';
            die();
     }

header("Location: tnbShipmentSummary.php");
exit;


 
?>