<?php
 ob_start();
 session_start();
 require_once 'dbconnect.php';
 
 // if session is not set this will redirect to login page
 if( !isset($_SESSION['user']) ) {
  header("Location: index.php");
  exit;
 } 
 ?>
<?php
 // select loggedin users detail
 $res=mysqli_query($conn, "SELECT * FROM members WHERE ID=".$_SESSION['user']);
 $userRow=mysqli_fetch_array($res);
 $userID = $userRow['mortalis'];
 $memberID = $_SESSION['user'];
 $mor=mysqli_query($conn, "SELECT * FROM mortalis WHERE ID=$userID");
 $mortRow=mysqli_fetch_array($mor);
 $characterID = $mortRow['characterID'];
 $cha=mysqli_query($conn, "SELECT * FROM characters WHERE ID=$characterID");
 $charRow=mysqli_fetch_array($cha);
 $bat=mysqli_query($conn, "SELECT * FROM battle WHERE playerID=$memberID");
 $battle=mysqli_fetch_array($bat);
 if($battle) {
	//activiteit 
$updatetime = time();
 $upDate = "UPDATE battle SET 
	activity = '$updatetime'
	WHERE playerID = $memberID";

	if (mysqli_query($conn,$upDate)) {
		echo"updated";
	}
 }
 else {
	 $updatetime = time();
	 $playerID = $memberID;
	 $opponentID = 0;
	 $mortalisID = $userID;
	 $inbattle = 0;
	 $opponentmortalisID = 0;
	 $activity = $updatetime;
	 $health = 100;
	 $lastattack = "None";
	 
	 echo"niet gevonden";
	  $query = "INSERT INTO `battle`(`playerID`, `opponentID`, `mortalisID`, `opponentmortalisID`, `inbattle`, `activity`, `health`, `lastattack`) VALUES ('".$playerID."','".$opponentID."','".$mortalisID."','".$opponentmortalisID."','".$inbattle."','".$activity."','".$health."','".$lastattack."')"; 
	     
   if (mysqli_query($conn,$query)) {
	echo"Welcome!<br>New account was created";
	}
 }

 //HIER BEGINNEN WE
 $isinbattle = $battle['inbattle'];
if ($isinbattle == 1) {
 $opp=mysqli_query($conn, "SELECT * FROM battle WHERE opponentID=$memberID");
 $oppbattle=mysqli_fetch_array($opp);
 $battleopponentID = $oppbattle['mortalisID'];
 $opponentID = $oppbattle['playerID'];
  $batmor=mysqli_query($conn, "SELECT * FROM mortalis WHERE ID=$battleopponentID");
 $batmortRow=mysqli_fetch_array($batmor);
 $healthopponent = $oppbattle['health'];
 $healthme = $battle['health'];
 $batcharacterID = $batmortRow['characterID'];
 $pictureme = $charRow['picture1'];
 $lastattack = $battle['lastattack'];
  $batcha=mysqli_query($conn, "SELECT * FROM characters WHERE ID=$batcharacterID");
 $batcharRow=mysqli_fetch_array($batcha);
 $pictureopponent = $batcharRow['picture1'];
   $batmem=mysqli_query($conn, "SELECT * FROM members WHERE ID=$opponentID");
 $batmemRow=mysqli_fetch_array($batmem);
 
 
	?>
    
<table style="background-repeat:no-repeat; background-size:contain; background-image:url(battlearena.png)" width="80%" align="center" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td align="right"><?php 
	$nicknameopponent = $batmemRow['nickname'];
	echo"<strong>$nicknameopponent</strong>"; ?><br />
	<?php echo"$batmortRow[nickname] $healthopponent"; ?>%<br />
    <progress max="100" value="<?php echo"$healthopponent"; ?>"></progress>
  </td>
  </tr>
  <tr><?php
  $BIGOPPONENT = strtoupper($nicknameopponent).'S';
  ?>
    <td><img id="attackme" src="battle/<?php echo"$pictureme"; ?>" width="50%"><img id="attackopponent" src="battleopponent/<?php echo"$pictureopponent"; ?>" width="50%"></td>
  </tr>
  <tr bgcolor="#666666">
    <?php if ($lastattack == 0) { 
	echo"<td align=\"center\" style=\"color:#0F0\"><strong>ITS YOUR TURN</strong>"; 
	}
	else {
		echo"<td align=\"center\" style=\"color:#F60\"><strong>ITS $BIGOPPONENT TURN</strong>";
	}
	?></td>
  </tr>
  <tr height="15">
    <td align="left">HEALTH:<?php echo"$healthme"; ?>%</td>
  </tr>
  <tr height="15">
    <td align="left">
	<?php if ($lastattack == 1) { 
	echo"<button type=\"button\">GIVE UP</button>"; 
	}
	else { 
	echo"<button onclick=\"document.getElementById('attackme').src='battle/attack/$pictureme';document.getElementById('attackopponent').src='battleopponent/attack/$pictureopponent';attack1();\">Attack</button><button type=\"post\" onclick=\"attack1();\" value=\"$memberID\" name=\"member\">ATTACK2</button><button type=\"button\">ATTACK3</button>"; 
	}
	?>
    </td><button type="submit" onclick="attack1();">RARE BUTTON</button>
  </tr>
</table>
    
    <?php
	
}
elseif ($isinbattle == 2) {
 $opp=mysqli_query($conn, "SELECT * FROM battle WHERE opponentID=$memberID");
 $oppbattle=mysqli_fetch_array($opp);
 $battleopponentID = $oppbattle['mortalisID'];
 $opponentID = $oppbattle['playerID'];
  $batmor=mysqli_query($conn, "SELECT * FROM mortalis WHERE ID=$battleopponentID");
 $batmortRow=mysqli_fetch_array($batmor);
 $healthopponent = $oppbattle['health'];
 $healthme = $battle['health'];
 $batcharacterID = $batmortRow['characterID'];
 $pictureme = $charRow['picture1'];
 $lastattack = $battle['lastattack'];
  $batcha=mysqli_query($conn, "SELECT * FROM characters WHERE ID=$batcharacterID");
 $batcharRow=mysqli_fetch_array($batcha);
 $pictureopponent = $batcharRow['picture1'];
   $batmem=mysqli_query($conn, "SELECT * FROM members WHERE ID=$opponentID");
 $batmemRow=mysqli_fetch_array($batmem);
 $nicknameopponent = $batmemRow['nickname'];
 echo "REQUESTING ATTACK FROM $nicknameopponent";
 echo "CANCEL REQUEST";
 
	}
	elseif ($isinbattle == 3) {
 $opp=mysqli_query($conn, "SELECT * FROM battle WHERE opponentID=$memberID");
 $oppbattle=mysqli_fetch_array($opp);
 $battleopponentID = $oppbattle['mortalisID'];
 $opponentID = $oppbattle['playerID'];
  $batmor=mysqli_query($conn, "SELECT * FROM mortalis WHERE ID=$battleopponentID");
 $batmortRow=mysqli_fetch_array($batmor);
 $healthopponent = $oppbattle['health'];
 $healthme = $battle['health'];
 $batcharacterID = $batmortRow['characterID'];
 $pictureme = $charRow['picture1'];
 $lastattack = $battle['lastattack'];
  $batcha=mysqli_query($conn, "SELECT * FROM characters WHERE ID=$batcharacterID");
 $batcharRow=mysqli_fetch_array($batcha);
 $pictureopponent = $batcharRow['picture1'];
   $batmem=mysqli_query($conn, "SELECT * FROM members WHERE ID=$opponentID");
 $batmemRow=mysqli_fetch_array($batmem);
 $nicknameopponent = $batmemRow['nickname'];
 ?>
 <table style="background-image:url(images/bgrequest.png); background-size:cover" width="100%" height="60%" border="0" cellspacing="5" cellpadding="0">
  <tr>
    <td colspan="3" align="center"><h1>BATTLE REQUEST</h1></td>
  </tr>
   <tr>
    <td colspan="3" align="center" height="20"><hr size="2" /></td>
  </tr>
  <tr>
    <td align="center" width="45%"><h1>YOU</h1></td>
    <td width="10%">&nbsp;</td>
    <td align="center" width="45%"><h1><?php echo $nicknameopponent; ?></h1></td>
  </tr>
  <tr>
    <td  align="center"><img width="50%" src="mortalis/<?php echo"$pictureme"; ?>" style="max-height:300; max-width:300"></td>
    <td valign="middle"><h1>VS</h1></td>
    <td align="center"><img width="50%" src="mortalis/<?php echo"$pictureopponent"; ?>" style="max-height:300; max-width:300"></td>
    </tr>
    <td colspan="3" align="center" height="20"><hr size="2" /></td>
  </tr>
    <tr>
    <td colspan="3" align="center"><a href="home.php?page=fight&player=<?php echo"$opponentID"; ?>"><img src="images/acceptfight.png" width="40%"></a><a href="home.php?page=reject&player=<?php echo"$opponentID"; ?>"><img src="images/rejectfight.png" width="40%"></a></td>
  </tr>
</table><?php
 
	}
else {
	$time = time();
	$time2 = time() - 1;
	$time3 = time() - 5;
	?>
    <table width="100%" border="1" cellspacing="5" cellpadding="0">
  <tr>
    <td>Welcome to the arena, <?php echo "$userRow[nickname]"; ?></td>
    <td>Health:<?php echo "$battle[health]"; ?></td>
  </tr>
  <tr>
    <td colspan="2">Pick someone from the list to start a battle. <br />Winner takes all!</td>
  </tr>
  <tr>
    <td>Chat</td><td>
    <?php
	// CHECK IF BATTLE IS 1
	$checkinbattle = 0;
	$blist=mysqli_query($conn, "SELECT * FROM battle WHERE playerID!=$memberID AND inbattle=$checkinbattle AND activity>$time3 ORDER BY ID ASC");
	while ($lijst = mysqli_fetch_array($blist)) {
	$bpID = $lijst['playerID'];
	$blijst=mysqli_query($conn, "SELECT * FROM members WHERE ID=$bpID");
 	$battlespeler=mysqli_fetch_array($blijst);
 	$battlemortID = $battlespeler['mortalis'];
 	$bmort=mysqli_query($conn, "SELECT * FROM mortalis WHERE ID=$battlemortID");
 	$battlemortalis=mysqli_fetch_array($bmort);
	$playermortalis = $battlemortalis['nickname'];
	$playernames = $battlespeler['nickname'];
	
	echo "<a href=\"home.php?page=battle&player=$battlemortID\">$playernames [$lijst[health]]</a><br>";

 		}

}
 
?></td>
  </tr>
</table>