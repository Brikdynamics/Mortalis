<?php
 if( !isset($_SESSION['user']) ) {
  header("Location: index.php");
  exit;
 }
 
if (!isset($_GET['player'])) {
header("Location: home.php?page=test");
  exit;				
}

else {
	 $res=mysqli_query($conn, "SELECT * FROM members WHERE ID=".$_SESSION['user']);
 $userRow=mysqli_fetch_array($res);
 $userID = $userRow['mortalis'];
  $memberID = $_SESSION['user'];
 $mor=mysqli_query($conn, "SELECT * FROM mortalis WHERE ID=$userID");
 $mortRow=mysqli_fetch_array($mor);
 $mortalisID = $mortRow['ID'];
	$time = time();
	$time2 = time() - 1;
	$time3 = time() - 5;
	$defineplayer = $_GET['player'];
	$checkinbattle = 2;
	$define=mysqli_query($conn, "SELECT * FROM battle WHERE playerID=$defineplayer AND inbattle=$checkinbattle AND activity>$time3");
	$hoeveelgevonden = mysqli_num_rows($define);
	if ($hoeveelgevonden > 0) {
	$blijst=mysqli_query($conn, "SELECT * FROM members WHERE ID=$defineplayer");
 	$battlespeler=mysqli_fetch_array($blijst);
 	$battlemortID = $battlespeler['mortalis'];
 	$bmort=mysqli_query($conn, "SELECT * FROM mortalis WHERE ID=$battlemortID");
 	$battlemortalis=mysqli_fetch_array($bmort);
	$playermortalis = $battlemortalis['nickname'];
	$playernames = $battlespeler['nickname'];
	echo "We hebben hem gevonden hoor $mortexp! $playernames $playermortalis";
	//VANAF HIER UPDATE HIJ DE USERS VOOR DE BATTLE
		$inbattle = 0;
		$lastattack = 1;
		$upDate = "UPDATE battle SET 
		opponentID = '$defineplayer',
		mortalisID = '$mortalisID',
		opponentmortalisID = '$battlemortID',
		inbattle = '$inbattle',
		lastattack = '$lastattack'
		WHERE playerID = $memberID";
	//
		if (mysqli_query($conn,$upDate)) {
			echo"updated";
		}	
		// OOK ZIJNES WORDT GEUPDATE
		$inbattle = 0;
		$lastattack = 0;
		$upDate = "UPDATE battle SET 
		opponentID = '$memberID',
		mortalisID = '$battlemortID',
		opponentmortalisID = '$mortalisID',
		inbattle = '$inbattle',
		lastattack = '$lastattack'
		WHERE playerID = $defineplayer";
	//
		if (mysqli_query($conn,$upDate)) {
			echo"updated";
		}	
		header("Location: home.php?page=test");					
	}
	else {
		echo"This user is not active!";
		header('Refresh: 3; URL=home.php?page=test');
  exit;	
	}
}
	?>