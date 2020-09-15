<?php
 ob_start();
 session_start();

 include_once 'dbconnect.php';

if ($_GET['jaikbenadmin'] == 'robert') {
		//DIT IS VOOR DE UPLOAD

//DIT IS VOOR DE CHARACTER	
	$name = $_POST['bonusname'];
	$country = $_POST['country'];
	$city = $_POST['city'];
	$street = $_POST['street'];
	$location = $_POST['location'];
	$found = 0;
	$foundby = 0;
	$datum =  date("m.d.y g:i");
	$foundon = 0;
	$letter1 = chr(rand(65,90));
	$letter2 = rand(1000,9999);
	$letter3 = chr(rand(65,90));
	$letter4 = rand(1000,9999);
	$letter5 = chr(rand(65,90));
	$letter6 = chr(rand(65,90));
	$code = "$letter1$letter2$letter3$letter4$letter5$letter6";
	$bonustype = $_POST['bonustype'];
	$win = $_POST['win'];
	$win2 = $_POST['win2'];

	//DOEMAARDAN
	$query = "INSERT INTO `bonus`(`name`, `country`, `city`, `street`, `location`, `found`, `foundby`, `datum`, `foundon`, `code`, `bonustype`, `win`, `win2`) 
	VALUES ('".$name."', '".$country."', '".$city."', '".$street."', '".$location."', '".$found."', '".$foundby."', '".$datum."', '".$foundon."', '".$code."', '".$bonustype."', '".$win."', '".$win2."')";

	if (!mysqli_query($conn,$query)) {
		$errTyp = "danger";
  	  	$errMSG = "Something went wrong, try again later..."; 
  	  	die('Error: ' . mysqli_error($conn));
    }
			
	echo"<strong>BONUS ADDED!</strong><br>";
	echo"<strong>Bonuscode:</strong> $code";
		}
else {
	
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Mortalis Game</title>
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"  />
<style type="text/css">
.Fixed
{
    position: fixed;
    top: 20px;
}
</style>
</head>
<body>
  <form enctype="multipart/form-data" name="image" method="post" action="home.php?page=addbonus&jaikbenadmin=robert">
  <h1 align="center">Voeg Bonus toe</h1>
  <table border="0" cellpadding="5" cellspacing="5" align="center">
  <tr><td>
  <label for="bonusname">Bonusname:</label></td><td>
    <input name="bonusname" type="text"><br>
    </td></tr><tr><td>
    <label for="country">Country:</label>
    </td><td>
     <input name="country" type="text"><br>
    </td></tr><tr><td>
    <label for="city">City:</label>
    </td><td>
    <input name="city" type="text"><br>
        </td></tr><tr><td>
    <label for="street">Street:</label>
    </td><td>
    <input name="street" type="text"><br>
        </td></tr><tr><td>
    <label for="location">Location:</label>
    </td><td>
    <input name="location" type="text"><br>
        </td></tr><tr><td>
    <label for="bonustype">Bonustype</label>
    </td><td>
    <select name="bonustype" id="bonustype">
     <option value="member">member</option>
     <option value="mortalis">mortalis</option>
	 <option value="items">items</option>
     <option value="attacks">attacks</option>
    </select><br>
    </td></tr><tr><td>
    <label for="win">Win Type:</label>
    </td><td>
    <select name="win" id="win">
     <option value="tokens">[member]Tokens</option>
     <option value="experience">[member]Experience</option>
     <option value="gold">[member]Gold</option>
     <option value="silver">[member]Silver</option>
     <option value="bronze">[member]Bronze</option>
     <option value="iron">[member]Iron</option>
     <option value="aluminum">[member]Aluminum</option>
     <option value="stamina">[member]Stamina</option>
    <option value="mortalis">FREE MORTALIS</option>
    <option value="items">FREE ITEM</option>
    <option value="attacks">FREE ATTACK</option>
    </select><br>
        </td></tr><tr><td>
   <label for="win2">Value or ID:</label>
    </td><td>
    <input name="win2" type="text"><br>
        </td></tr>
<tr><td>
        
    </td><td>
    <input type="submit" name="Submit" value="Add Bonus"/><br>
        </td></tr></table>
</form>
</body>
</html>
<?php 
}
ob_end_flush(); ?>