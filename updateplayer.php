<?php 
if ($_GET['p']) {
	$playerid = $_GET['p'];
	$pup=mysqli_query($conn, "SELECT * FROM members WHERE ID = $playerid");
	$pstats=mysqli_fetch_array($pup);
	$sName = $pstats['nickname'];
	$sEmail = $pstats['email'];
	$sTokens = $pstats['tokens'];
	$sValid = $pstats['valid'];
	$sValidate = $pstats['validate'];
	$sID = $pstats['ID'];
	$sVip = $pstats['vip'];
    echo"<form action=\"home.php?page=updateplayerprocess\" method=\"POST\"><table cellpadding=\"0\" cellspacing=\"15\" border=\"0\" width=\"100%\" bgcolor=\"#000\">
	<tr>
		<td align=\"right\" width=\"40%\"><h2>EDIT PROFILE </h2></td>
				<td align=\"left\"><h2>OF PLAYER $sName</h2></td>
	</tr>
	<tr>
		<td align=\"right\" width=\"40%\"><strong>ID:</strong></td>
		<td align=\"left\"><input name=\"id\" type=\"text\" value=\"$sID\" /></td>
	</tr>
	<tr>
		<td align=\"right\" width=\"40%\"><strong>Playername:</strong></td>
		<td align=\"left\"><input name=\"nickname\" type=\"text\" value=\"$sName\" /></td>
	</tr>
	<tr>
		<td align=\"right\"><strong>E-mail:</strong></td>
		<td align=\"left\"><input name=\"email\" type=\"text\" value=\"$sEmail\" /></td>
	</tr>
	<tr>
		<td align=\"right\">(<i>0=reg/1=vip/3=help/5=mod/9=adm</i>) <strong>Userlevel:</strong></td>
		<td align=\"left\"><input name=\"vip\" type=\"text\" value=\"$sVip\" /></td>
	</tr>
	<tr>
		<td align=\"right\"><strong>Tokens:</strong></td>
		<td align=\"left\"><input name=\"tokens\" type=\"text\" value=\"$sTokens\" /></td>
	</tr>
	<tr>
		<td align=\"right\"><strong>Valid:</strong></td>
		<td align=\"left\"><input name=\"valid\" type=\"text\" value=\"$sValid\" /></td>
	</tr>
		<tr>
		<td align=\"right\"><strong>Validate:</strong></td>
		<td align=\"left\"><input name=\"validate\" type=\"text\" value=\"$sValidate\" /></td>
	</tr>
	<td>&nbsp;</td><td align=\"left\">
		<input type=\"submit\" value=\"Save status\"></td>
		</td>	</tr>
		<tr>
		<td align=\"right\">&nbsp;</td>
		<td align=\"left\"><a href=\"javascript:history.go(-1)\">[Go Back]</a></td>
	</tr>
		</tr>
		</table>";
}
else { 
	$prow=mysqli_query($conn, "SELECT * FROM members ORDER BY vip DESC");
	?>
	<table cellpadding="0" cellspacing="3" border="1" width="100%" bgcolor="#000">
    <tr><td><strong>ID</strong></td><td><strong>Nickname</strong></td><td><strong>E-mail</strong></td><td><strong>Level</strong></td><td><strong>Action</strong></td></tr>
    <?php
	while ($playerRow = mysqli_fetch_array($prow)) {
		$pName = $playerRow['nickname'];
		$pEmail = $playerRow['email'];
		$pID = $playerRow['ID'];
		$pVip = $playerRow['vip'];
		if ($pVip == 1) {
			$pLevel = "VIP user";
		}
		elseif ($pVip == 3) {
			$pLevel = "Helper";
		}
		elseif ($pVip == 5) {
			$pLevel = "Operator";
		}
		elseif ($pVip == 9) {
			$pLevel = "Administrator";
		}
		else {
			$pLevel = "User";
		}
    	echo"<tr><td>$pID</td><td>$pName</td><td>$pEmail</td><td>[$pVip]$pLevel</td><td><a href=\"home.php?page=updateplayer&p=$pID\">UPDATE</a></td></tr>";
	}
echo "</table>";
}
?>
