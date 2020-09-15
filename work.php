<?php
 ob_start();
 session_start();

 include_once 'dbconnect.php';
 
 if (!isset($_GET['land'])) {
	 if (!isset($_GET['c'])) {
		 echo"Something went wrong!";
	 }
}
else {
$userStamina = $userRow['stamina'];
if ($userStamina > 99) {
	$land = $_GET['land'];
		if  ($land == 1) { 
			$landsquares = 50; 
			$landrows = 10;
			$landimage = "images/map1.jpg";
		} 
		elseif ($land == 2) { 
			$landsquares = 100; 
			$landrows = 10;
			$landimage = "images/map2.jpg";
		} 
		elseif ($land == 3) { 
			$landsquares = 400; 
			$landrows = 20;
			$landimage = "images/map3.jpg";
		} 
		else {
				echo"Not enough stamina to complete your quest.";
		} 
	if (isset($_GET['c'])) {
		$c = $_GET['c'];
		if ($c > $landsquares) {
			echo"You cheater";
		}
		else {
			if ($land == 2 && $level < 5) {
				echo "Cheater!";
			}
			elseif ($land == 3 && $level < 10) {
				echo "Cheater!";
			}
			else {
/////////////////////////
/////////////////////////
////// BEREKENEN ////////
////// ALS  GOED ////////
/////////////////////////
/////////////////////////

				$skilled = $mortRow['digging'];
				$maxskill = $landsquares / 2;
				if ($skilled == 0) {
					$skilled = 1;
				}
				elseif ($skilled >= $maxskill) {
					$skilled = $maxskill;
				}
				else {
					$skilled = $skilled;
				}


				$s = 0;
				$diggingitems = 0;
				$winbericht = "<table align=\"center\" width=\"50%\" style=\"max-height: 60px\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\"><tr>";
				$userID = $_SESSION['user'];
				while ($s < $skilled) {
					$randskills = rand(1,$landsquares);
					$s++;
					// goud
					if ($randskills == 1) {
						$diggingitems++;
						$gevonden = rand(1,$level);
						
						$upDate = "
							UPDATE members
							SET gold=gold+$gevonden
							WHERE ID='".$userID."'
						";
						if (mysqli_query($conn,$upDate)) {
							$winbericht = $winbericht."<td><table border=\"0\" cellspacing=\"0\" cellpadding=\"0\"><tr><td><img src=\"metals/gold.png\" style=\"max-height: 60px\"></td></tr><tr><td>$gevonden.00</td></tr></table></td>";
						}
						else {
							$winbericht = $winbericht."<br>GOUD NIET TOEGEVOEGD";
						}
					}
					// silver
					elseif ($randskills == 2) {
						$diggingitems++;
						$gevonden = rand(1,$level);
						$upDate = "
							UPDATE members
							SET silver=silver+$gevonden
							WHERE ID='".$userID."'
						";
						if (mysqli_query($conn,$upDate)) {
						$winbericht = $winbericht."<td><table border=\"0\" cellspacing=\"0\" cellpadding=\"0\"><tr><td><img src=\"metals/silver.png\" style=\"max-height: 60px\"></td></tr><tr><td>$gevonden.00</td></tr></table></td>";
						}
						else {
							$winbericht = $winbericht."<br>silver NIET TOEGEVOEGD";
						}
					}
					// bronze
					elseif ($randskills == 3) {
						$diggingitems++;
						$gevonden = rand(1,$level);
						$upDate = "
							UPDATE members
							SET bronze=bronze+$gevonden
							WHERE ID='".$userID."'
						";
						if (mysqli_query($conn,$upDate)) {
						$winbericht = $winbericht."<td><table border=\"0\" cellspacing=\"0\" cellpadding=\"0\"><tr><td><img src=\"metals/bronze.png\" style=\"max-height: 60px\"></td></tr><tr><td>$gevonden.00</td></tr></table></td>";
						}
						else {
							$winbericht = $winbericht."<br>bronze NIET TOEGEVOEGD";
						}			
					}
					// iron
					elseif ($randskills == 4) {
						$diggingitems++;
						$gevonden = rand(1,$level);
						$upDate = "
							UPDATE members
							SET iron=iron+$gevonden
							WHERE ID='".$userID."'
						";
						if (mysqli_query($conn,$upDate)) {
						$winbericht = $winbericht."<td><table border=\"0\" cellspacing=\"0\" cellpadding=\"0\"><tr><td><img src=\"metals/iron.png\" style=\"max-height: 60px\"></td></tr><tr><td>$gevonden.00</td></tr></table></td>";
						}
						else {
							$winbericht = $winbericht."<br>iron NIET TOEGEVOEGD";
						}
					}
					// aluminum
					elseif ($randskills == 5) {
						$diggingitems++;
						$gevonden = rand(1,$level);
						$upDate = "
							UPDATE members
							SET aluminum=aluminum+$gevonden
							WHERE ID='".$userID."'
						";
						if (mysqli_query($conn,$upDate)) {
						$winbericht = $winbericht."<td><table border=\"0\" cellspacing=\"0\" cellpadding=\"0\"><tr><td><img src=\"metals/aluminum.png\" style=\"max-height: 60px\"></td></tr><tr><td>$gevonden.00</td></tr></table></td>";
						}
						else {
							$winbericht = $winbericht."<br>aluminum NIET TOEGEVOEGD";
						}
					}
					// stamina
					elseif ($randskills == 6) {
						$diggingitems++;
						$gevonden = rand(50,250);
						$userStamina = $userStamina + $gevonden;
						$upDate = "
							UPDATE members
							SET stamina=stamina+$gevonden
							WHERE ID='".$userID."'
						";
						if (mysqli_query($conn,$upDate)) {
						$winbericht = $winbericht."<td><table border=\"0\" cellspacing=\"0\" cellpadding=\"0\"><tr><td><img src=\"STAMINAFOTO.png\" style=\"max-height: 60px\"></td></tr><tr><td>$gevonden.00</td></tr></table></td>";
						}
						else {
							$winbericht = $winbericht."<br>stamina NIET TOEGEVOEGD";
						}
					}
					// tokens
					elseif ($randskills == 7) {
						$diggingitems++;
						$gevonden = rand(1,20) / 100;
						$upDate = "
							UPDATE members
							SET tokens=tokens+$gevonden
							WHERE ID='".$userID."'
						";
						if (mysqli_query($conn,$upDate)) {
						$winbericht = $winbericht."<td><table border=\"0\" cellspacing=\"0\" cellpadding=\"0\"><tr><td><img src=\"TOKENS.png\" style=\"max-height: 60px\"></td></tr><tr><td>$gevonden.00</td></tr></table></td>";
						}
						else {
							$winbericht = $winbericht."<br>tokens NIET TOEGEVOEGD";
						}
					}
				}
			
				if ($diggingitems > 0) {
					echo"$winbericht</tr></table>";
					$pakstamina = "
							UPDATE members
							SET stamina=stamina-100
							WHERE ID='".$userID."'
						";
						if (mysqli_query($conn,$pakstamina)) {
							$userStamina = $userStamina - 100;
						echo"Quest was completed for 100 stamina!<br>$userStamina stamina left!";
						}
						else {
							$winbericht = $winbericht."<br>silver NIET TOEGEVOEGD";
						}
					echo"<a href=\"javascript:history.back()\">Try again</a><br>";
					echo"<a href=\"home.php?page=aaa\">Try a different location</a><br>";
					
				}
				else {
					echo"Too bad, no items were found!<br>Better luck next time!<br><br>";
					$pakstamina = "
							UPDATE members
							SET stamina=stamina-100
							WHERE ID='".$userID."'
						";
						if (mysqli_query($conn,$pakstamina)) {
							$userStamina = $userStamina - 100;
						echo"Quest was completed for 100 stamina!<br>$userStamina stamina left!";
						}
						else {
							$winbericht = $winbericht."<br>silver NIET TOEGEVOEGD";
						}
					echo"<a href=\"javascript:history.back()\">Try again</a><br>";
					echo"<a href=\"home.php?page=aaa\">Try a different location</a><br>";
				}
			}
/////////////////////////
/////////////////////////
		}
	} 
	else {
		if ($land == 2 && $level < 5) {
			echo"This map will be unlocked on level 5!";
		}
		elseif ($land == 3 && $level < 10) {
			echo"This map will be unlocked on level 10!";
		}
		else {
	?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Mortalis game</title>
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"  />
<style type="text/css">
table.work {
border: 2px solid white;
}
tr.work {
	padding: 0px
	}
	
td.work {
	border: 1px dashed #999;
	
	padding: 0px; 
	overflow: hidden
	}
	
td.work a {
	margin: -1em; 
	padding: 2em; 
	display: block; 
	}
td.work a:hover {
	background-color: #000;
	opacity: 0.2;
	filter: alpha(opacity=20);	
}
td.work a:active {
	background-color: #FFF;
	opacity: 0.2;
	filter: alpha(opacity=20);	
}
</style>

</script>
</head>
<body>
<div align="center"><h2>Click anywhere on the map to start searching</h2></div>
<table class="work" align="center" width="600" background="<?php echo $landimage; ?>" style="background-size: 100% 100%;" border="1"  cellspacing="0" cellpadding="0">

<tbody>
  <?php
  $icols = $landsquares / $landrows;
  $r = 0;
  $z = 0;
  $landheight = 600 / $landrows;
  while ($z < $landsquares) {
		while ($r < $landrows) {
			$i = 0;
			echo "<tr class=\"work\">";
			while ($i < $icols) {
					$i++;
					$z++;
					echo "<td height=\"$landheight\" class=\"work\"><a href=\"home.php?page=work&land=$land&c=$z\"><div>&nbsp;</div></a></td>";
			}
			echo "</tr>";
			$r++;
		}
  }
  ?>
  </tbody>
</table>
</body>
</html>
<?php 
	}
}
}
	else {
		echo"Not enough stamina<br>You only have <strong>$userStamina</strong> stamina while you need <strong>100</strong> stamina to complete this quest!";
	}
}
ob_end_flush(); ?>