<?php
session_start();

if ($_SESSION["verified"] == false) {
  session_destroy();
  header("Location: tnbSignIn.php");
  die();
}
?>
<html>

<head>
    <title>ThereNBack.com-Shipment Summary </title>
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
    
    //Print the shipment's logistal data
    echo "<a href=\"thereNBack.php\">Cancle</a><table>
    <tr>
      <th>Pickup As Early As </th>
      <th>Pickup State</th>
      <th>Pickup City</th>
      <th>Deliver by</th>
      <th>Delivery State</th>
      <th>Delivery City</th>
    </tr>";
      echo "<tr><td>" . $_SESSION['pickUpDate'] . "</td>";
      echo "<td>" . $_SESSION['pickUpState'] . "</td>";
      echo "<td>" . $_SESSION['pickUpCity'] . "</td>";
      echo "<td>" . $_SESSION['dropOffDate'] . "</td>";
      echo "<td>" . $_SESSION['dropOffState'] . "</td>";
      echo "<td>" . $_SESSION['dropOffCity'] . "</td></tr>";
      echo "</table>";
      echo '<br><table id=mainTable><tr><th>Item</th>
              <th>Description</th><th>Weight</th><th>Width</th>
              <th>Height</th><th>Depth</th>
              <th>Special Instructions</th></tr>';

      //Print the shipment's item data
      foreach ($_SESSION['itemNames'] as $item => $values)
      {
        if($values != $_SESSION['itemDescriptions'][$item]){
        echo "<tr><td>" . $_SESSION['itemNames'][$item] . "</td>";
        echo "<td>" . $_SESSION['itemDescriptions'][$item] . "</td>";
        echo "<td>" . $_SESSION['itemWeights'][$item] . "</td>";
        echo "<td>" . $_SESSION['itemWidths'][$item] . "</td>";
        echo "<td>" . $_SESSION['itemHeights'][$item] . "</td>";
        echo "<td>" . $_SESSION['itemDepths'][$item] . "</td>";
        echo "<td>" . $_SESSION['itemspecialInstructs'][$item] . "</td></tr>";
        }
      } 
      echo "</table>";

    ?>
    <!-- Redirect us to add more items or to insert them-->
    <a href="tnbItemForm.php"><button>Add Another Item</button></a>
    <a href="tnbShipmentInsert.php"><button>Post Shipment</button></a>
</body>

</html>