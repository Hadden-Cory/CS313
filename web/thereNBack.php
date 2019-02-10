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

echo '<table>';
foreach ($db->query('SELECT
Ship_Loc.ship_loc_is_pickup,
ship_loc.ship_loc_state,
ship_Loc.ship_loc_city
from
ship_loc') as $row)
{
  echo '<tr><td>Shippers: '. $row['shipper.shipper_name'].'</td>';
  echo '<td>Start: '. $row['shipment.shipment_start_date'].'</td></tr>';
}
echo '</table>';

?>
<section>
