<?php
require "dbConnect.php";
$db = get_db();

//Shared credit for the login systems belongs to Sebastian Calle,
//Sheldon Smith, and Stefano Nicotra. We (and by "we" I
//mean I feel like it was mostly them because they are such
//competent programers) wrote most of it in a team activty.
//It fit so well into my project that all I did was retyped 
//it out so that I understood and added a few functionality
// points that I wanted. I have changed very little of this
// code. So, special thanks to them. Used with permission.

$userName = $_POST["shipper_name"];
$_SESSION['userNameIsFree'] = TRUE;

foreach ($db->query('SELECT shipper_name FROM shipper') as $row){
    echo "18";
    if($userName == $row['shippername']){
        $_SESSION['userNameIsFree'] = FALSE;
        echo "21";
    }
    
    if(!$_SESSION['userNameIsFree']){
        echo "26";
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

