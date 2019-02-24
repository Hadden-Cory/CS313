<?php
 //Start Session, connect to db, live happily ever after.
session_start();
require("dbConnect.php");
$db = get_db();
?>
<html>

<head>
    <title>ThereNBack.com-Home</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="plants.css">
    <link rel="stylesheet" type="text/css" href="tnb.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="tnb.js"></script>
</head>

<body>
    <?php include("header.php");
    if ($_SESSION["verified"] == false) {
        session_destroy();
        header("Location: tnbSignIn.php");
        die();
    }

    echo"<a href=\"thereNBack.php\">Back</a><table>";
    foreach ($db->query("SELECT
                        ship.shipment_start_date,
                        ship.id_shipment,
                        pfrom.pickup_from_city,
                        pfrom.pickup_from_state, 
                        ship.shipment_end_date,
                        shipto.ship_to_city,
                        shipto.ship_to_state
                        FROM
                            shipment AS ship 
                            inner join shipper as shipr on ship.Shipper_id_shipper = shipr.id_shipper
                            inner join ship_to as shipto on ship.id_shipment = shipto.shipment_id_shipment 
                            inner join pickup_from as pfrom on ship.id_shipment = pfrom.shipment_id_shipment 
                            WHERE ship.shipper_id_shipper = '".$_SESSION['id_shipper']."'
                        order by
                            ship.id_shipment DESC,
                            ship_to_city DESC;") as $row) {
        //Loop though each row and make us a html table!
        $rowCount++;


        echo '<tr><td>' . htmlspecialchars($row['shipment_start_date']) . '</td>';
        echo '<td>' . htmlspecialchars($row['ship_to_city']) . '</td>';
        echo '<td>' . htmlspecialchars($row['ship_to_state']) . '</td>';
        echo '<td>' . htmlspecialchars($row['shipment_end_date']) . '</td>';
        echo '<td>' . htmlspecialchars($row['pickup_from_city']) . '</td>';
        echo '<td>' . htmlspecialchars($row['pickup_from_state']) . '</td>';
        echo '<td><form name="opt' . $rowCount . '" action="tnbDeleteShipment.php" " method="POST">
                                                    <input type="text" class="collapse" name="shipmentId" value="' 
                                                    . htmlspecialchars($row['id_shipment']) . '">
                                                    <input type="submit" onclick="post" value="Remove Post"></form>
                                                          </td>';
        echo '<td><form name="opt' . $rowCount . '" action="tnbViewBids.php" " method="POST">
                                                    <input type="text" class="collapse" name="shipmentId" value="' 
                                                    . htmlspecialchars($row['id_shipment']) . '">
                                                    <input type="submit" onclick="post" value="View Bids"></form>
            </td>';
        echo '</tr>';
    }
    echo '</table>'; //Make the table stop 
    ?> 