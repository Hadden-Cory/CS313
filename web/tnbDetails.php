<?php
session_start();
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

    <?php include("header.php");

    echo '<div id="container" class="r>
            <div class="row h-50">
            <div class="col-sm-2 col-lg-2">
            </div>
            <div class="col-sm-8 col-lg-8">
            <div id="container" class="r>
            <div class="row h-50">
            <div class="col-sm-2 col-lg-2">
            <table id=mainTable><tr><th>Pickup As Early As </th>
            <th>Pickup City</th><th>Pickup State</th>
            <th>Deliver by</th><th>Delivery City</th>
            <th>Delivery State</th></tr>';

    foreach ($db->query('SELECT
    ship.shipment_start_date,
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
where
    ship.shipper_id_shipper = 1') as $row) {
        echo '<tr><td>' . $row['shipment_start_date'] . '</td>';
        echo '<td>' . $row['ship_to_city'] . '</td>';
        echo '<td>' . $row['ship_to_state'] . '</td>';
        echo '<td>' . $row['shipment_end_date'] . '</td>';
        echo '<td>' . $row['pickup_from_city'] . '</td>';
        echo '<td>' . $row['pickup_from_state'] . '</td>';
        echo '</tr>';
    }
    echo '</table>';

    echo '<table id=mainTable><tr><th>Item</th>
      <th>Description</th><th>Special Instructions</th>
      <th>Weight</th><th>Width</th>
      <th>Depth</th><th>Height</th></tr>';

    foreach ($db->query(
        'SELECT
    i.item_name,
    i.item_description,
    i.item_spcl_instructs,
    i.shipment_id_shipment,
    s.size_weight,
    s.size_width,
    s.size_depth,
    s.size_height
    from 
    item as I
    inner join size as s on i.size_id_size = s.id_size
    where i.shipment_id_shipment = 1;'
    ) as $row) {
        echo '<tr><td>' . $row['item_name'] . '</td>';
        echo '<td>' . $row['item_description'] . '</td>';
        echo '<td>' . $row['item_spcl_instructs'] . '</td>';
        echo '<td>' . $row['size_weight'] . 'lb</td>';
        echo '<td>' . $row['size_width'] / 12 . 'ft ' . $row['size_width'] % 12 . 'in</td>';
        echo '<td>' . $row['size_depth'] / 12 . 'ft ' . $row['size_depth'] % 12 . 'in</td>';
        echo '<td>' . $row['size_height'] / 12 . 'ft ' . $row['size_height'] % 12 . 'in</td>';
        echo '</tr>';
    }
    ?>
    </table>
    </div>
    <div class="col-sm-2 col-lg-2">
    </div>
    </div>
    <section>