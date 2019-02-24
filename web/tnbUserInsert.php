<?php
session_start();
require "dbConnect.php";
$db = get_db();

$userName = $_POST["shipper_name"];
$_SESSION['userNameIsFree'] = TRUE;
   
foreach ($db->query('SELECT shipper_name FROM shipper') as $row){

    if($userName == $row['shipper_name']){
        $_SESSION['userNameIsFree'] = FALSE;

    }
    
    if(!$_SESSION['userNameIsFree']){

        header("Location: tnbSignUp.php");
        exit;
    }
    
}

$password = $_POST["shipper_password"];
$passwordHash = password_hash($password, PASSWORD_BCRYPT);

$statement = $db->prepare("INSERT INTO shipper (shipper_name, shipper_password_hash)
                           VALUES (:cleanUsername, :cleanPasswordHash)");
$statement->bindValue(":cleanUsername", $userName, PDO::PARAM_STR);
$statement->bindValue(":cleanPasswordHash", $passwordHash, PDO::PARAM_STR);
$statement->execute();  

header("Location: tnbSignIn.php");
exit;

