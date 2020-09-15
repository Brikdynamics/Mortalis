<?php
 ob_start();
 session_start();

 include_once 'dbconnect.php';

if ($_GET['bonus'] == 'submit') {
	// OF ER WEL EEN BONUSCODE IS INGEVOERD
	if (!empty($_POST['code'])) {
		$bonuscode = $_POST['code'];
		$bon=mysqli_query($conn, "SELECT * FROM bonus WHERE code='$bonuscode'");
		$boncount = mysqli_num_rows($bon);
   		$bonusRow=mysqli_fetch_array($bon);
		// KIJKEN OF DE BONUSCODE BESTAAT
		if ($boncount == 1) {
			$bonususername = $userRow['nickname'];
			$bonusname = $bonusRow['name'];
			$bonuscountry = $bonusRow['country'];
			$bonuscity = $bonusRow['city'];
			$bonusstreet = $bonusRow['street'];
			$bonuslocation = $bonusRow['location'];
			$bonusfound = $bonusRow['found'];
			$bonusfoundby = $bonusRow['foundby'];
			$bonusdatum = $bonusRow['datum'];
			$bonusfoundon = $bonusRow['foundon'];
			$bonustype = $bonusRow['bonustype'];
			$bonuswin = $bonusRow['win'];
			$bonuswin2 = $bonusRow['win2'];
			$datefound = date("m.d.y g:i"); 
			// KIJKEN OF HIJ GEVONDEN IS
			if ($bonusfound == 0) {
				////////////////////////////////////////////
				/////////							 ///////
				/////////            MEMBERS         ///////
				/////////							 ///////
				////////////////////////////////////////////
				if ($bonustype == 'member') {
					// MEMBER BONUS TOKENS
					if ($bonuswin == 'tokens') {
						$currenttokens = $userRow['tokens'];
						$updatedtokens = $currenttokens + $bonuswin2;
						$bonusquery = "UPDATE members SET tokens = '$updatedtokens' WHERE nickname='$bonususername'";
						if (!mysqli_query($conn,$bonusquery)) {
							$errTyp = "danger";
  	  						$errMSG = "Something went wrong, try again later..."; 
  	  						die('Error: ' . mysqli_error($conn));
    					}
						$bonusquery2 = "UPDATE bonus SET found = '1', foundby = '$bonususername',foundon = '$datefound' WHERE code='$bonuscode'";
						if (!mysqli_query($conn,$bonusquery2)) {
							$errTyp = "danger";
  	  						$errMSG = "Something went wrong, try again later..."; 
  	  						die('Error: ' . mysqli_error($conn));
    					}
						//ALLES IS GOED GEGAAN DUS DIT IS ERBIJ GEKOMEN
						echo "<strong>SUCCESS!</strong><br>There were<strong> $bonuswin2 </strong>tokens added to your account, $bonususername!";
					}
					// MEMBER BONUS STAMINA
					elseif ($bonuswin == 'stamina') {
						$currentstamina = $userRow['stamina'];
						$updatedstamina = $currentstamina + $bonuswin2;
						$bonusquery = "UPDATE members SET stamina = '$updatedstamina' WHERE nickname='$bonususername'";
						if (!mysqli_query($conn,$bonusquery)) {
							$errTyp = "danger";
  	  						$errMSG = "Something went wrong, try again later..."; 
  	  						die('Error: ' . mysqli_error($conn));
    					}
						$bonusquery2 = "UPDATE bonus SET found = '1', foundby = '$bonususername',foundon = '$datefound' WHERE code='$bonuscode'";
						if (!mysqli_query($conn,$bonusquery2)) {
							$errTyp = "danger";
  	  						$errMSG = "Something went wrong, try again later..."; 
  	  						die('Error: ' . mysqli_error($conn));
    					}
						//ALLES IS GOED GEGAAN DUS DIT IS ERBIJ GEKOMEN
						echo "<strong>SUCCESS!</strong><br>There is<strong> $bonuswin2 </strong>stamina added to your account, $bonususername!";
					}
					// MEMBER BONUS GOLD
					elseif ($bonuswin == 'gold') {
						$currentgold = $userRow['gold'];
						$updatedgold = $currentgold + $bonuswin2;
						$bonusquery = "UPDATE members SET gold = '$updatedgold' WHERE nickname='$bonususername'";
						if (!mysqli_query($conn,$bonusquery)) {
							$errTyp = "danger";
  	  						$errMSG = "Something went wrong, try again later..."; 
  	  						die('Error: ' . mysqli_error($conn));
    					}
						$bonusquery2 = "UPDATE bonus SET found = '1', foundby = '$bonususername',foundon = '$datefound' WHERE code='$bonuscode'";
						if (!mysqli_query($conn,$bonusquery2)) {
							$errTyp = "danger";
  	  						$errMSG = "Something went wrong, try again later..."; 
  	  						die('Error: ' . mysqli_error($conn));
    					}
						//ALLES IS GOED GEGAAN DUS DIT IS ERBIJ GEKOMEN
						echo "<strong>SUCCESS!</strong><br>There is<strong> $bonuswin2 </strong>gold added to your account, $bonususername!";
					}
					// MEMBER BONUS SILVER
					elseif ($bonuswin == 'silver') {
						$currentsilver = $userRow['silver'];
						$updatedsilver = $currentsilver + $bonuswin2;
						$bonusquery = "UPDATE members SET silver = '$updatedsilver' WHERE nickname='$bonususername'";
						if (!mysqli_query($conn,$bonusquery)) {
							$errTyp = "danger";
  	  						$errMSG = "Something went wrong, try again later..."; 
  	  						die('Error: ' . mysqli_error($conn));
    					}
						$bonusquery2 = "UPDATE bonus SET found = '1', foundby = '$bonususername',foundon = '$datefound' WHERE code='$bonuscode'";
						if (!mysqli_query($conn,$bonusquery2)) {
							$errTyp = "danger";
  	  						$errMSG = "Something went wrong, try again later..."; 
  	  						die('Error: ' . mysqli_error($conn));
    					}
						//ALLES IS GOED GEGAAN DUS DIT IS ERBIJ GEKOMEN
						echo "<strong>SUCCESS!</strong><br>There is<strong> $bonuswin2 </strong>silver added to your account, $bonususername!";
					}
					// MEMBER BONUS BRONZE
					elseif ($bonuswin == 'bronze') {
						$currentbronze = $userRow['bronze'];
						$updatedbronze = $currentbronze + $bonuswin2;
						$bonusquery = "UPDATE members SET bronze = '$updatedbronze' WHERE nickname='$bonususername'";
						if (!mysqli_query($conn,$bonusquery)) {
							$errTyp = "danger";
  	  						$errMSG = "Something went wrong, try again later..."; 
  	  						die('Error: ' . mysqli_error($conn));
    					}
						$bonusquery2 = "UPDATE bonus SET found = '1', foundby = '$bonususername',foundon = '$datefound' WHERE code='$bonuscode'";
						if (!mysqli_query($conn,$bonusquery2)) {
							$errTyp = "danger";
  	  						$errMSG = "Something went wrong, try again later..."; 
  	  						die('Error: ' . mysqli_error($conn));
    					}
						//ALLES IS GOED GEGAAN DUS DIT IS ERBIJ GEKOMEN
						echo "<strong>SUCCESS!</strong><br>There is<strong> $bonuswin2 </strong>bronze added to your account, $bonususername!";
					}
					// MEMBER BONUS IRON
					elseif ($bonuswin == 'iron') {
						$currentiron = $userRow['iron'];
						$updatediron = $currentiron + $bonuswin2;
						$bonusquery = "UPDATE members SET iron = '$updatediron' WHERE nickname='$bonususername'";
						if (!mysqli_query($conn,$bonusquery)) {
							$errTyp = "danger";
  	  						$errMSG = "Something went wrong, try again later..."; 
  	  						die('Error: ' . mysqli_error($conn));
    					}
						$bonusquery2 = "UPDATE bonus SET found = '1', foundby = '$bonususername',foundon = '$datefound' WHERE code='$bonuscode'";
						if (!mysqli_query($conn,$bonusquery2)) {
							$errTyp = "danger";
  	  						$errMSG = "Something went wrong, try again later..."; 
  	  						die('Error: ' . mysqli_error($conn));
    					}
						//ALLES IS GOED GEGAAN DUS DIT IS ERBIJ GEKOMEN
						echo "<strong>SUCCESS!</strong><br>There is<strong> $bonuswin2 </strong>iron added to your account, $bonususername!";
					}
					// MEMBER BONUS ALUMINUM
					elseif ($bonuswin == 'aluminum') {
						$currentaluminum = $userRow['aluminum'];
						$updatedaluminum = $currentaluminum + $bonuswin2;
						$bonusquery = "UPDATE members SET aluminum = '$updatedaluminum' WHERE nickname='$bonususername'";
						if (!mysqli_query($conn,$bonusquery)) {
							$errTyp = "danger";
  	  						$errMSG = "Something went wrong, try again later..."; 
  	  						die('Error: ' . mysqli_error($conn));
    					}
						$bonusquery2 = "UPDATE bonus SET found = '1', foundby = '$bonususername',foundon = '$datefound' WHERE code='$bonuscode'";
						if (!mysqli_query($conn,$bonusquery2)) {
							$errTyp = "danger";
  	  						$errMSG = "Something went wrong, try again later..."; 
  	  						die('Error: ' . mysqli_error($conn));
    					}
						//ALLES IS GOED GEGAAN DUS DIT IS ERBIJ GEKOMEN
						echo "<strong>SUCCESS!</strong><br>There is<strong> $bonuswin2 </strong>aluminum added to your account, $bonususername!";
					}
					// MEMBER BONUS EXPERIENCE
					elseif ($bonuswin == 'experience') {
						$currentexperience = $userRow['experience'];
						$updatedexperience = $currentexperience + $bonuswin2;
						$bonusquery = "UPDATE members SET experience = '$updatedexperience' WHERE nickname='$bonususername'";
						if (!mysqli_query($conn,$bonusquery)) {
							$errTyp = "danger";
  	  						$errMSG = "Something went wrong, try again later..."; 
  	  						die('Error: ' . mysqli_error($conn));
    					}
						$bonusquery2 = "UPDATE bonus SET found = '1', foundby = '$bonususername',foundon = '$datefound' WHERE code='$bonuscode'";
						if (!mysqli_query($conn,$bonusquery2)) {
							$errTyp = "danger";
  	  						$errMSG = "Something went wrong, try again later..."; 
  	  						die('Error: ' . mysqli_error($conn));
    					}
						//ALLES IS GOED GEGAAN DUS DIT IS ERBIJ GEKOMEN
						echo "<strong>SUCCESS!</strong><br>There is<strong> $bonuswin2 </strong>experience added to your account, $bonususername!";
					}
					else {
						echo "Something went wrong with $bonuswin";
					}
				}
				////////////////////////////////////////////
				/////////							 ///////
				/////////            MORTALIS        ///////
				/////////							 ///////
				////////////////////////////////////////////
				elseif ($bonustype == 'mortalis') {
					// FREE MORTALIS
					if ($bonuswin == 'mortalis') {
						$currentplayerID = $userRow['ID'];
						$bonusquery = "UPDATE mortalis SET playerID = '$currentplayerID' WHERE ID='$bonuswin2'";
						if (!mysqli_query($conn,$bonusquery)) {
							$errTyp = "danger";
  	  						$errMSG = "Something went wrong, try again later..."; 
  	  						die('Error: ' . mysqli_error($conn));
    					}
						$bonusquery2 = "UPDATE bonus SET found = '1', foundby = '$bonususername',foundon = '$datefound' WHERE code='$bonuscode'";
						if (!mysqli_query($conn,$bonusquery2)) {
							$errTyp = "danger";
  	  						$errMSG = "Something went wrong, try again later..."; 
  	  						die('Error: ' . mysqli_error($conn));
    					}
						//ALLES IS GOED GEGAAN DUS DIT IS ERBIJ GEKOMEN
						echo "<strong>SUCCESS!</strong><br>You just recieved a new Mortalis, $bonususername!";
						$chra=mysqli_query($conn, "SELECT * FROM mortalis WHERE ID='$bonuswin2'");
   						$freecharacter=mysqli_fetch_array($chra);
							$freecID = $freecharacter['ID'];
							$freecname = $freecharacter['nickname'];
    						$freectype = $freecharacter['type'];
							$freecicon = "elements/" . $freectype . ".png";
    						$freecattack = $freecharacter['attack'];
    						$freecdefense = $freecharacter['defense'];
    						$freecworking = $freecharacter['working'];
    						$freectracking = $freecharacter['tracking'];
    						$freecdiving = $freecharacter['diving'];
    						$freecfishing = $freecharacter['fishing'];
    						$freechunting = $freecharacter['hunting'];
    						$freecdigging = $freecharacter['digging'];
    						$freecpicture = $freecharacter['picture'];
						?>
                        <table border="0" cellpadding="5" cellspacing="0" style="color:#FFF" bgcolor="#666666" width="240">
                    <tr>
                      <td colspan="2" height="57" align="center" background="charbar.png" bgcolor="#FFF" style="color: #FFF; font-size: 30px; font: Arial, Helvetica, sans-serif; background-size: cover; font-family: 'Comic Sans MS', cursive;" valign="top"><img src="<?php echo $freecicon ?>" width="30"> <strong><?php echo $freecname; ?></strong></td>
                    </tr>
                    <tr>
                      <td colspan="2" bgcolor="#FFF"><img src="characters/<?php echo $freecpicture; ?>" width="250"></td>
                    </tr>
                    <tr>
                      <td colspan="2" height="57" align="center" background="charbar2.png" bgcolor="#FFF" style="color: #000; font-size: 18px; font: Arial, Helvetica, sans-serif; background-size: cover; font-family: 'Comic Sans MS', cursive;" valign="middle"><strong>Skillset</strong></td>
                    </tr>
                    <tr bgcolor="#444">
                      <td><strong>Attack:</strong></td>
                      <td><progress value="<?php echo $freecattack; ?>" max="50"></progress></td>
                    </tr>
                    <tr bgcolor="#444">
                      <td><strong>Defense:</strong></td>
                      <td><progress value="<?php echo $freecdefense; ?>" max="50"></progress></td>
                    </tr>
                    <tr bgcolor="#444">
                      <td><strong>Working:</strong></td>
                      <td><progress value="<?php echo $freecworking; ?>" max="50"></progress></td>
                    </tr>
                    <tr bgcolor="#444">
                      <td><strong>Tracking:</strong></td>
                      <td><progress value="<?php echo $freectracking; ?>" max="50"></progress></td>
                    </tr>
                    <tr bgcolor="#444">
                      <td><strong>Diving:</strong></td>
                      <td><progress value="<?php echo $freecdiving; ?>" max="50"></progress></td>
                    </tr>
                    <tr bgcolor="#444">
                      <td><strong>Fishing:</strong></td>
                      <td><progress value="<?php echo $freecfishing; ?>" max="50"></progress></td>
                    </tr>
                    <tr bgcolor="#444">
                      <td width="80" ><strong>Hunting:</strong></td>
                      <td><progress value="<?php echo $freechunting; ?>" max="50"></progress></td>
                    </tr>
                    <tr bgcolor="#444">
                      <td><strong>Digging:</strong></td>
                      <td><progress value="<?php echo $freecdigging; ?>" max="50"></progress></td>
                    </tr>
                  </table><?php
					}
					else {
						echo "Something went wrong with $bonuswin";
					}
				}
				////////////////////////////////////////////
				/////////							 ///////
				/////////            ITEMLIST        ///////
				/////////							 ///////
				////////////////////////////////////////////
				elseif ($bonustype == 'items') {
					//update membershit
				}
				////////////////////////////////////////////
				/////////							 ///////
				/////////            ATTACKS         ///////
				/////////							 ///////
				////////////////////////////////////////////
				elseif ($bonustype == 'attacks') {
					//update membershit
				}
				else {
					echo "Something went wrong. Contact an administrator for further assistance";
				}
			//HIER GAAT ALLES NOG GOED
			}
			else {
				echo "$bonusname [$bonuscode]<br>";
				echo "Too bad! This bonus was already found by $bonusfoundby on $bonusfoundon<br>";
				echo "$bonustype $bonuswin $bonuswin2";
			}		
		}
		else {
			echo "Invalid bonuscode";
			echo "$bonuscode en $boncount";
		}
	}
	else {
		echo "No bonuscode was found";
	}
}
else {
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Mortalis game</title>
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"  />
<link rel="stylesheet" href="style.css" type="text/css" />
<style type="text/css">
.Fixed
{
    position: fixed;
    top: 20px;
}
</style>

</script>
</head>
<body>
  <form enctype="multipart/form-data" name="image" method="post" action="home.php?page=bonus&bonus=submit">
  <h1 align="center">Check Bonuscode</h1>
  <table border="0" cellpadding="5" cellspacing="5" align="center">
  <tr><td>
  <label for="code">CODE:</label></td><td>
    <input name="code" type="text"><br>
    </td></tr>
<tr><td>
       
    <input type="submit" name="Submit" value="Check Bonus"/><br>
        </td></tr></table>
</form>

</body>
</html>
<?php 
}
ob_end_flush(); ?>