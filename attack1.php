<?php
session_start();
 require_once 'batconnect.php';
?><?php
	 $res=mysqli_query($conn, "SELECT * FROM members WHERE ID=".$_SESSION['user']);
 $userRow=mysqli_fetch_array($res);
 $memberID = $_SESSION['user'];
 $userID = $userRow['mortalis'];
 $mor=mysqli_query($conn, "SELECT * FROM mortalis WHERE ID=$userID");
 $mortRow=mysqli_fetch_array($mor);
 $mortalisID = $mortRow['ID'];
	$time = time();
	$time2 = time() - 1;
	$time3 = time() - 5;
	$checkinbattle = 1;
	$defopp=mysqli_query($conn, "SELECT * FROM battle WHERE opponentID=$memberID");
	$defineopponent=mysqli_fetch_array($defopp);
	$defineplayer = $defineopponent['playerID'];
	echo $memberID;
	echo $defineplayer;
	$checkinbattle = 1;
	$define=mysqli_query($conn, "SELECT * FROM battle WHERE playerID=$defineplayer AND inbattle=$checkinbattle");
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
	$player1exp = $mortRow['experience'];
	$player2exp = $battlemortalis['experience'];
	$damagep2 = $player1exp / $player2exp * 60 / 3;
		$lastattack = 1;
		$upDate = "UPDATE battle SET 
		lastattack = '$lastattack'
		WHERE playerID = $memberID";
	//
		if (mysqli_query($conn,$upDate)) {
			echo"updated";
		}	
		// OOK ZIJNES WORDT GEUPDATE
		$lastattack = 0;
		$upDate = "UPDATE battle SET 
		health = health - $damagep2,
		lastattack = '$lastattack'
		WHERE playerID = $defineplayer";
	//
		if (mysqli_query($conn,$upDate)) {
			echo"updated";
		}					
	}
	else {
		$ditisdememberID = $_POST['member'];
		echo"This user is not active! $ditisdememberID .";
  exit;	
	}

	?>