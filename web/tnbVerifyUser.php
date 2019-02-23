<?php
    session_start();
    require "dbConnect.php";
    
    //Shared credit for the login systems belongs to Sebastian Calle,
    //Sheldon Smith, and Stefano Nicotra. We (and by "we" I
    //mean I feel like it was mostly them because they are such
    //competent programers) wrote most of it in a team activty.
    //It fit so well into my project that all I did was retyped 
    //it out so that I understood and added a few functionality
    // points that I wanted. I have changed very little of this
    // code. So, special thanks to them. Used with permission.

    //Get database store the name password hash sent to us by the sign in page 
    $db = get_db();
    $userName = $_POST["shipper_name"];
    $password = $_POST["shipper_password"];

    //Sanitize the input
    $statement = $db->prepare("SELECT shipper_password_hash, id_shipper FROM shipper WHERE shipper_name = :cleanUsername;");
    $statement->bindValue(":cleanUsername", $userName, PDO::PARAM_STR);
    $statement->execute();

    //Grab the hash and verify it
    $row = $statement->fetch(PDO::FETCH_ASSOC);
    $passwordHash = $row["shipper_password_hash"];
    $passwordIsVerified = password_verify($password, $passwordHash);

    //What to do if they entered the right password. 
    if ($passwordIsVerified) {
        $_SESSION['lastAttemptFailed'] = FALSE;
        $_SESSION["verified"] = true;
        $_SESSION["username"] = $userName;
        $_SESSION["id_shipper"] = $row["id_shipper"]; //Refactored ''
        header("Location: thereNBack.php");
        exit;
    } else { //Send em' back cause they didn't pass
        $_SESSION['lastAttemptFailed'] = TRUE;
        $_SESSION["verified"] = false;
        $_SESSION["username"] = null;
        header("Location: tnbSignIn.php");
        exit;
}
?>
 