<?php 
	$nickname = $_POST['nickname'];
	$id = $_POST['id'];
	$email = $_POST['email'];
	$tokens = $_POST['tokens'];
	$valid = $_POST['valid'];
	$validate = $_POST['validate'];
	$vip = $_POST['vip'];
	$upDate = "UPDATE members SET 
	nickname = '$nickname',
	email = '$email',
	tokens = '$tokens',
	valid = '$valid',
	validate = '$validate',
	vip = '$vip'
	WHERE ID = $id";

	if (mysqli_query($conn,$upDate)) {
    	echo "<table cellpadding=\"0\" cellspacing=\"15\" border=\"0\" width=\"100%\" bgcolor=\"#000\">
	<tr>
		<td align=\"center\" width=\"100%\"><br>Stats of <strong>[$id]$nickname</strong> were succesfully updated.<br><br><a href=\"javascript:history.go(-1)\">[Go Back]</a>";
		
	} else {
    	echo "ERROR: $sql. " . mysqli_error($conn);
	}
mysql_close();
?>