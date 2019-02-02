<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cory CS313 Portfolio Form Submission</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="plants.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="plants.js"></script>
</head>
<body>
<?php include("header.php");?>
Name: <?php echo $_POST["user-name"]; ?><br>
Email address: <a href="mailto:<?php echo $_POST["email"]; ?>"><?php echo $_POST["email"]; ?></a> <br>
You are currently a <?php echo $_POST["major"]; ?> major <br>
And here are your comments: <?php echo $_POST["comment"]; ?> <br>
You have visited: <br>
<?php
if(!empty($_POST['continent'])) {
    $continentsMap = array("NA" => "North America", "SA" => "South America", "EU" => "Europe", "AA" => "Asia", "AF" => "Africa","AN" => "Antartica" );
    foreach($_POST['continent'] as $key => $value) {
        echo $continentsMap[$value]."</br>";
    }
}?>
</body>
</html>