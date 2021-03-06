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
    } ?>

    <div id="container" class="center">
        <div class="row h-5">
            <div class="col-sm-2 col-lg-2">
            </div>
            <div class="col-sm-8 col-lg-8">
                <h1>Welcome
                    <?php echo htmlspecialchars($_SESSION["username"]); ?>
                </h1>
                <h2>
                    Let's Move A Mountain
                </h2>
            </div>
            <div class="col-sm-2 col-lg-2">
            </div>
        </div>
        <div class="row h-50">
            <div class="col-sm-2 col-lg-2">

                <form name="form" action="tnbLogout.php" method="post">
                    <input type="submit" class="btn btn-light w-100" value="Logout">
                </form>
                <a href="tnbShipmentForm.php"><button class="btn btn-light w-100">Enter A Shipment</button></a><br><br>
                <a href="tnbShipmentEdit.php"><button class="btn btn-light w-100">View Your Shipments</button></a>
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
                                                ship_to_city DESC;') as $row) {
                        //Loop though each row and make us a html table!
                        $rowCount++;

                        echo '<tr><td>' . htmlspecialchars($row['shipment_start_date']) . '</td>';
                        echo '<td>' . htmlspecialchars($row['ship_to_city']) . '</td>';
                        echo '<td>' . htmlspecialchars($row['ship_to_state']) . '</td>';
                        echo '<td>' . htmlspecialchars($row['shipment_end_date']) . '</td>';
                        echo '<td>' . htmlspecialchars($row['pickup_from_city']) . '</td>';
                        echo '<td>' . htmlspecialchars($row['pickup_from_state']) . '</td>';
                        echo '<td><form name="opt' . $rowCount . '" action="tnbDetails.php" " method="POST">
                                                                 <input type="text" class="collapse" name="shippmentId" value="' . htmlspecialchars($row['id_shipment']) . '">
                                                                 <input type="submit" class="btn btn-light" onclick="post" value="Load Info"></form>
                                                          </td>';
                        echo '</tr>';
                    }
                    echo '</table>'; //Make the table stop 
                    ?>
            </div>
            <div class="col-sm-2 col-lg-2">
            </div>
        </div>
    </div>
    <section>