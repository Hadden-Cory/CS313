<html>
<head>
    <title>ThereNBack.com</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="plants.css">
    <link rel="stylesheet" type="text/css" href="tnb.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="plants.js"></script>
</head>
<body>
    
<?php include("header.php"); 

echo '<div id="container">';

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


// foreach ($db->query('SELECT username, password FROM note_user') as $row)
// {
//   echo 'user: ' . $row['username'];
//   echo ' password: ' . $row['password'];
//   echo '<br/>';

//   $statement = $db->query('SELECT username, password FROM note_user');
// while ($row = $statement->fetch(PDO::FETCH_ASSOC))
// {
//   echo 'user: ' . $row['username'] . ' password: ' . $row['password'] . '<br/>';
// }

echo '<table id=mainTable><tr><th>Pickup As Early As </th>
      <th>Pickup City</th><th>Pickup State</th></tr>';

foreach ($db->query('SELECT
shipment.shipment_start_date,
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
    if('ship_loc_is_pickup'==true){
    echo '<tr><td>'.$row['shipment_start_date'].'</td>';
    echo '<td>'.$row['ship_loc_city'].'</td>';
    echo '<td>'.$row['ship_loc_state'].'</td>';
    echo '</tr>';
    }
}
echo '</table>';

?>
</div>
<section>
