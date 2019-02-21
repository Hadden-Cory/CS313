<?php
//Start Session, connect to db, live happily ever after.
session_start();
require("dbConnect.php");
$db = get_db();
?>
<html>

<head>
    <title>ThereNBack.com</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="plants.css">
    <link rel="stylesheet" type="text/css" href="tnb.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="tnb.js"></script>
</head>

<body>
    <?php include("header.php");?>
    <div id="container" class="center">
        <div class="row h-50">
            <div class="col-sm-2 col-lg-2">
            </div>
            <div class="col-sm-8 col-lg-8"><br><br><br>
                 <!-- We will be building this table for several lines. The first group is the headings, 
                      followed by a large query and finished with a loop through all the query results-->
                <table id=mainTable>
                    <tr>
                        <th>Pickup As Early As </th>
                        <th>Pickup City</th>
                        <th>Pickup State</th>
                        <th>Deliver by</th>
                        <th>Delivery City</th>
                        <th>Delivery State</th>
                        <th></th>
                    </tr>
                    
                    <?php 
                    $rowCount = 0;  
                    
                    //We're building a table by querying the database for general shipment information and inserting it into a HTML table 
                    //Query
                    $shipId=array();
                    foreach ($db->query('SELECT
                                            ship.shipment_start_date,
                                            ship.id_shipment,
                                            pfrom.pickup_from_city,
                                            pfrom.pickup_from_state, 
                                            ship.shipment_end_date,
                                            shipto.ship_to_city,
                                            shipto.ship_to_state
                                            from
                                                shipment as ship
                                                inner join shipper as shipr on ship.Shipper_id_shipper = shipr.id_shipper
                                                inner join ship_to as shipto on ship.id_shipment = shipto.shipment_id_shipment 
                                                inner join pickup_from as pfrom on ship.id_shipment = pfrom.shipment_id_shipment 
                                            order by
                                                ship.id_shipment DESC,
                                                ship_to_city DESC;') as $row) 
                                                {
                                                    //Loop though each row and make us a html table!
                                                    $rowCount++;
                                                    
                                                    array_push($shipId, $row['id_shipment']);
                                                    echo '<tr><td>' . $row['shipment_start_date'] . '</td>';
                                                    echo '<td>' . $row['ship_to_city'] . '</td>';
                                                    echo '<td>' . $row['ship_to_state'] . '</td>';
                                                    echo '<td>' . $row['shipment_end_date'] . '</td>';
                                                    echo '<td>' . $row['pickup_from_city'] . '</td>';
                                                    echo '<td>' . $row['pickup_from_state'] . '</td>';?>
                                                   <td> <button onclick="doThings()"><?php echo $rowCount; ?></button> </td>
                                                   <?php
                                                    // echo '<td> <button onclick="doThings()">'.$row['id_shipment'].'</button><form name="opt' . $rowCount . '" action="tnbDetails.php" " method="POST">
                                                    //              <input type="text" class="collapse" name="shippmentId" value="'.$row['id_shipment'].'">
                                                    //              <input type="submit" onclick="post" value="Load Info">
                                                    //       </td>';
                                                          
                                                    echo "<td>".$row['id_shipment']."</td>";
                                                    echo '</tr>';

                                                    function doThings(){
                                                        //  var value = document.getElementById().value;
                                                          alert(value);
                                                      }
                    }
                    echo '</table>'; //Make the table stop 
 ?>
                
            </div>
            <div class="col-sm-2 col-lg-2">
            </div>
        </div>
    </div>
    <section>