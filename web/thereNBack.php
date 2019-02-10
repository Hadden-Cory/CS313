<html>
<head>
    <title>ThereNBack.com</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="plants.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="plants.js"></script>
</head>
<body>
    <?php include("header.php"); 

    try
{
  $dbUrl = getenv('DATABASE_URL');

  $dbOpts = parse_url($dbUrl);

  $dbHost = $dbOpts["host"];
  $dbPort = $dbOpts["port"];
  $dbUser = $dbOpts["user"];
  $dbPassword = $dbOpts["pass"];
  $dbName = ltrim($dbOpts["path"],'/');

  $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $ex)
{
  echo 'Error!: ' . $ex->getMessage();
  die();
}

echo '<table>';
foreach ($db->query('SELECT
shipper.shipper_name, name
shipment.shipment_start_date, date
shipment.shipment_end_date,
Ship_Loc.ship_loc_is_pickup,
ship_loc.ship_loc_state,
ship_Loc.ship_loc_city
from
shipment
inner join shipper on shipment.Shipper_id_shipper = Shipper.id_shipper
inner join ship_loc on shipment.id_shipment = ship_loc.shipment_id_shipment
order by
shipment.id_shipment DESC,
ship_loc_city DESC,
ship_loc_is_pickup ASC;') as $row)
{
  echo '<tr><td>Shippers: '. $row['name'].'</td>';
  echo '<td>Start: '. $row['date'].'</td></tr>';
}
echo '</table>';
?>
<section>
