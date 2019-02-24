<?php
session_start();
require("dbConnect.php");
$db = get_db();
?>
<html>

<head>
    <title>ThereNBack.com-Shipment Details</title>
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
    ?>

             <!-- Bid Table Time -->
                <table>
                    <tr>
                        <th>Price</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Phone</th>
                        <th>Notes</th>
                    </tr>
                    <?php 
                    //Query bids
                    foreach ($db->query("SELECT
                                                bid_price,
                                                bid_stat_date,
                                                bid_end_date,
                                                bid_contact_number,
                                                bid_spcl_instruct
                                            FROM
                                                 bid 
                                            WHERE 
                                                shipment_id_shipment = '" . $selectionId . "';") as $row) {
                        echo '<tr><td>' . htmlspecialchars($row['bid_price']) . '</td>';
                        echo '<td>' . htmlspecialchars($row['bid_stat_date']) . '</td>';
                        echo '<td>' . htmlspecialchars($row['bid_end_date']) . '</td>';
                        echo '<td>' . htmlspecialchars($row['bid_contact_number']) . '</td>';
                        echo '<td>' . htmlspecialchars($row['bid_spcl_instruct']) . '</td></tr>';
                    }
                    ?>
                </table>
            
</body>

</html>