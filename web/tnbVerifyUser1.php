<?php
    session_start();
    require "dbConnect.php";
 
    //Sheldon and Stefano Wrote nearly all of this code in our group meeting. It was just really reusable. 
   $db = get_db();
    $userName = $_POST["shipper_name"];
    $password = $_POST["shipper_password"];

    $statement = $db->prepare("SELECT shipper_password_hash, id_shipper FROM shipper WHERE shipper_name = :cleanUsername;");
    $statement->bindValue(":cleanUsername", $userName, PDO::PARAM_STR);
    $statement->execute();

    $row = $statement->fetch(PDO::FETCH_ASSOC);
    $passwordHash = $row["shipper_password_hash"];

    $passwdIsVerified = password_verify($password, $passwordHash);

    if ($passwdIsVerified) {
        $_SESSION["verified"] = TRUE;
        $_SESSION["username"] = $userName;
        $_SESSION['id_shipper'] = $row["id_shipper"];
        header("Location: thereNBack.php");
        exit;   
    }
    else {
        $_SESSION["verified"] = FALSE;
        $_SESSION["username"] = NULL;
        header("Location: tnbSignIn.php");
        exit;
    }

    ?>