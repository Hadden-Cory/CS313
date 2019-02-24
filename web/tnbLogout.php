<?php session_start();
session_destroy();
header('Location: tnbSignIn.php');
exit;
 ?>