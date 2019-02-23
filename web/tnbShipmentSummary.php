<?php
session_start();
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
    echo "<table>
            <tr>
                <th>Pickup As Early As </th>
                <th>Pickup City</th>
                <th>Pickup State</th>
                <th>Deliver by</th>
                <th>Delivery City</th>
                <th>Delivery State</th>
            </tr>";
    echo "<tr><td>" . $_SESSION['pickUpDate'] . "</td>";
    echo "<td>" . $_SESSION['pickUpState'] . "</td>";
    echo "<td>" . $_SESSION['pickUpCity'] . "</td>";
    echo "<td>" . $_SESSION['dropOffDate'] . "</td>";
    echo "<td>" . $_SESSION['dropOffState'] . "</td>";
    echo "<td>" . $_SESSION['dropOffCity'] . "</td></tr>";

    echo '<br><table id=mainTable><tr><th>Item</th>
            <th>Description</th><th>Special Instructions</th>
            <th>Weight</th><th>Width</th>
            <th>Depth</th><th>Height</th></tr><tr>';
    $index = 0;
    foreach ($itemName as $item) {
      echo "<td>" . $_SESSION['itemNames']['item'.$index] . "</td>";
      echo "<td>" . $_SESSION['itemDescriptions ']['description'.$index] . "</td>";
      echo "<td>" . $_SESSION['itemWeights']['weights'.$index] . "</td>";
      echo "<td>" . $_SESSION['itemWidths']['widths'.$index] . "</td>";
      echo "<td>" . $_SESSION['itemHeights']['heights'.$index] . "</td>";
      echo "<td>" . $_SESSION['itemDepths']['depths'.$index] . "</td></tr>";
      echo "<td>" . $_SESSION['itemSpclInstructs']['instructions'.$index] . "</td></tr>";
      $index++;
    }

    ?>
    <a href="tnbItemForm.php"><button>Add Another Item</button></a>
    <a href="tnbShipmentInsert.php"><button>Post Shipment</button></a>
</body>

</html>