<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cory CS313 Basic Form</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="plants.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="plants.js"></script>
</head>
<body>
<?php include("header.php");?>
<div id="simple_form">
    <h1>Simple Form Processing</h1>
    <form id="form" name="form" action="week03b.php" method="POST">
    <h2>What is your name?</h2><br>        
        <input type="text" id="user-name" name="user-name"><br>
        <h2>What is your email address?</h2><br>        
        <input type="text" id="email" name="email"><br> 
        <br> 
        <h2>What is your major?</h2>
        <?php
            $majors = array("Computer Science", "Web Design and Development", "Computer information Technology", "Computer Engineering");
        foreach($majors as $m) {   
           echo "<input type=\"radio\" id=\"CS\" name=\"major\" value=".$m. ">".$m."<br>"; 
        }
        ?><br>
        <h2>Do you have any additional comments?</h2> 
        <input type="textarea" name="comment" id="comment"><br>
        <h2>Which continents have you visited?</h2><br> 
        <input type="checkbox" name="continent[]" id="north-america" value="NA">North America<br>
        <input type="checkbox" name="continent[]" id="south-america" value="SA">South America<br>
        <input type="checkbox" name="continent[]" id="europe" value="EU">Europe<br>
        <input type="checkbox" name="continent[]" id="asia" value="AA">Asia<br>
        <input type="checkbox" name="continent[]" id="australia" value="AU">Australia<br>
        <input type="checkbox" name="continent[]" id="africa" value="AF">Africa<br>
        <input type="checkbox" name="continent[]" id="Antarctica" value="AN">Antarctica<br>
        <input type="submit" name="submit" id="submit" value="Submit"><br>
    </form>
    </div>
</body>
</html>