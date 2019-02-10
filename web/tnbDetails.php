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
<div class="col-sm-8 col-lg-8">';

try {

    $dbUrl = getenv('DATABASE_URL');

    $dbOpts = parse_url($dbUrl);

    $dbHost = $dbOpts["host"];
    $dbPort = $dbOpts["port"];
    $dbUser = $dbOpts["user"];
    $dbPassword = $dbOpts["pass"];
    $dbName = ltrim($dbOpts["path"], '/');

    $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $ex) {
    echo 'Error!: ' . $ex->getMessage();
    die();
}

echo '<div id="container" class="r>
<div class="row h-50">
<div class="col-sm-2 col-lg-2">';

// $statement = $db->query('
// SELECT
//     ship.shipment_start_date,
//     pfrom.pickup_from_city,
//     pfrom.pickup_from_state, 
//     ship.shipment_end_date,
//     shipto.ship_to_city,
//     shipto.ship_to_state
// from
//     shipment as ship
//     inner join shipper as shipr on ship.Shipper_id_shipper = shipr.id_shipper
//     inner join ship_to as shipto on ship.id_shipment = shipto.shipment_id_shipment 
//     inner join pickup_from as pfrom on ship.id_shipment = pfrom.shipment_id_shipment 
// where
//     id_shipment = 1;
// ');
// $results = $statement->fetchAll(PDO::FETCH_ASSOC);

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
    where i.shipment_id_shipment = 1;') as $row)
    {
    echo '<tr><td>' . $row['item_name'] . '</td>';
    echo '<td>' . $row['item_description'] . '</td>';
    echo '<td>' . $row['item_spcl_instructs'] . '</td>';
    echo '<td>' . $row['size_weight'] . 'lb</td>';
    echo '<td>' . $row['size_width']/12 .'ft</td>';
    echo '<td>' . $row['size_depth']/12 . 'ft</td>';
    echo '<td>' . $row['size_height']/12 . 'ft</td>';
    echo '</tr>';
}
?>
    </table>
    </div>
    <div class="col-sm-2 col-lg-2">
    </div>
    </div>
    <section>