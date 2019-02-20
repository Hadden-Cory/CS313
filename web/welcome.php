<?php
    require 'dbConnect.php';

    try {
        session_start();
        $id_shipper = isset($_SESSION['id_shipper']) ? intval($_SESSION['id_shipper']) : 0;

        if ($id_shipper == 0 || $_SERVER["REQUEST_METHOD"] == "POST") {
            session_destroy();
            header("Location: signIn.php");
            die();
        }

        $shipper_query = $db->prepare('SELECT shipper_name FROM shipper WHERE id_shipper = :id_shipper;');
        $shipper_query->execute(array('id_shipper' => $id_shipper));
        $shipper = $shipper_query->fetch();

        $shipper_name = $shipper['shipper_name'];
    }
    catch(PDOException $ex) {
        echo 'Error. Details: $ex';
        die();
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Week 7 Team</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <h1>Welcome <?php echo $shipper_name; ?></h1>
    <form name="form" action="<?php echo $current_page; ?>" method="post">
        <input type="submit" value="Logout">
    </form>
</body>