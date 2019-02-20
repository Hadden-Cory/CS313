<?php
    session_start();
    require "dbConnect.php";
 
   $db = get_db();
    $userName = $_POST["shipper_name"];
    $password = $_POST["shipper_password"];
    //$passwordHash = password_hash($password, PASSWORD_BCRYPT);
    $statement = $db->prepare("SELECT shipper_id, shipper_password_hash FROM shipper WHERE shipper_name = $userName");
    $statement->execute();

    $row = $statement->fetch(PDO::FETCH_ASSOC);
    $passwordHash = $row["shipper_password_hash"];

    $passwdIsVerified = password_verify($password, $passwordHash);

    if ($passwdIsVerified) {
        $_SESSION["verified"] = TRUE;
        $_SESSION["username"] = $userName;

        header("Location: welcome.php");
        exit;
    }
    else {
        $_SESSION["verified"] = FALSE;
        $_SESSION["username"] = NULL;
        header("Location: signIn.php");
        exit;
    }

    ?>