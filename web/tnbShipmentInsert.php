
<?php
     session_start();
     require "dbConnect.php";
     $db = get_db();

    $username = $_SESSION["username"];
    $pickUpDate = $_POST["pickUpDate"];
    $pickUpState =$_POST["pickUpState"];
    $pickUpCity =$_POST["pickUpCity"];
    $DropOffDate =$_POST["DropOffDate"];
    $DropOffState =$_POST["DropOffState"];
    $DropOffCity =$_POST["DropOffCity"];
    $shipperId = 0;


    foreach ($db->query("SELECT id_shipper FROM shipper WHERE shipper_name = '$username'") as $row) 
        {
            $shipperId = $row['id_shipper'];
        }

    $statement=$db->prepare("INSERT INTO shipment (shipper_id_shipper, shipment_start_date, shipment_end_date)
                                VALUES(:shipperIdShipper, :shipmentStartDate, :shipmentEndDate)");
    $statement->bindValue(":shipperIdShipper", $shipperId, PDO::PARAM_STR);
    $statement->bindValue(":shipmentStartDate", $pickUpDate, PDO::PARAM_STR);
    $statement->bindValue(":shipmentEndDate", $dropOffDate, PDO::PARAM_STR);
    $statement->execute();

   
//    $statement = $db->prepare("INSERT INTO shipment (shipper_name, shipper_password_hash)
//                                VALUES (:cleanUsername, :cleanPasswordHash)");
//     $statement->bindValue(":cleanUsername", $username, PDO::PARAM_STR);
//     $statement->execute();

     header("Location: thereNBack.php");
     exit;
?>