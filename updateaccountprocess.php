<?php 
	$nickname = $_POST['nickname'];
	$id = $_POST['id'];
	$gold = $_POST['gold'];
	$tokens = $_POST['tokens'];
	$experience = $_POST['experience'];
	$stamina = $_POST['stamina'];
	$character = $_POST['character'];
	$aupDate = "UPDATE members SET 
	nickname = '$nickname',
	gold = '$gold',
	tokens = '$tokens',
	experience = '$experience',
	stamina = '$stamina' 
	WHERE ID = '$id'";

	if (mysqli_query($conn,$aupDate)) {
    	echo "<table cellpadding=\"0\" cellspacing=\"15\" border=\"0\" width=\"100%\" bgcolor=\"#000\">
	<tr>
		<td align=\"center\" width=\"100%\"><br>Stats of <strong>[$id]$nickname</strong> were succesfully updated.<br><br><a href=\"javascript:history.go(-1)\">[Go Back]</a>";
		
	} else {
    	echo "ERROR: $sql. " . mysqli_error($conn);
	}
mysql_close();
?>