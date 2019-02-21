
<?php
    require "dbConnect.php";

    $db = get_db();
    $userName = $_POST["shipper_name"];
    $password = $_POST["shipper_password"];
    $passwordHash = password_hash($password, PASSWORD_BCRYPT);
    
    $statement = $db->prepare("INSERT INTO shipper (shipper_name, shipper_password_hash)
                               VALUES (:cleanUsername, :cleanPasswordHash)");
    $statement->bindValue(":cleanUsername", $userName, PDO::PARAM_STR);
    $statement->bindValue(":cleanPasswordHash", $passwordHash, PDO::PARAM_STR);
    $statement->execute();

    header("Location: signIn.php");
    exit;
?>