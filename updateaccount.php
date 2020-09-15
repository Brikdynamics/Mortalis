<?php 
if ($_GET['a']) {
	$accountid = $_GET['a'];
	$aup=mysqli_query($conn, "SELECT * FROM members WHERE ID = $accountid");
	$astats=mysqli_fetch_array($aup);
	$aName = $astats['nickname'];
	$aGold = $astats['gold'];
	$aTokens = $astats['tokens'];
	$aExperience = $astats['experience'];
	$aStamina = $astats['stamina'];
	$aCharacter = $astats['character'];
	$aID = $astats['ID'];
	$aVip = $astats['vip'];
    echo"<form action=\"home.php?page=updateaccountprocess\" method=\"POST\"><table cellpadding=\"0\" cellspacing=\"15\" border=\"0\" width=\"100%\" bgcolor=\"#000\">
	<tr>
		<td align=\"right\" width=\"40%\"><h2>EDIT PLAYER/h2></td>
				<td align=\"left\"><h2>STATS OF $aName</h2></td>
	</tr>
	<tr>
		<td align=\"right\"><strong>ID:</strong></td>
		<td align=\"left\"><input name=\"id\" type=\"text\" value=\"$aID\" /></td>
	</tr>
	<tr>
		<td align=\"right\"><strong>Playername:</strong></td>
		<td align=\"left\"><input name=\"nickname\" type=\"text\" value=\"$aName\" /></td>
	</tr>
	<tr>
		<td align=\"right\"><strong>Gold:</strong></td>
		<td align=\"left\"><input name=\"gold\" type=\"text\" value=\"$aGold\" /></td>
	</tr>
	<tr>
		<td align=\"right\"><strong>Tokens:</strong></td>
		<td align=\"left\"><input name=\"tokens\" type=\"text\" value=\"$aTokens\" /></td>
	</tr>
	<tr>
		<td align=\"right\"><strong>Experience:</strong></td>
		<td align=\"left\"><input name=\"experience\" type=\"text\" value=\"$aExperience\" /></td>
	</tr>
	<tr>
		<td align=\"right\"><strong>Stamina:</strong></td>
		<td align=\"left\"><input name=\"stamina\" type=\"text\" value=\"$aStamina\" /></td>
	</tr>
		<tr>
		<td align=\"right\"><strong>Character:</strong></td>
		<td align=\"left\"><input name=\"character\" type=\"text\" value=\"$aCharacter\" /></td>
	</tr>
	<td>&nbsp;</td><td align=\"left\">
		<input type=\"submit\" value=\"Save player\"></td>
		</td>	</tr>
		<tr>
		<td align=\"right\">&nbsp;</td>
		<td align=\"left\"><a href=\"javascript:history.go(-1)\">[Go Back]</a></td>
	</tr>
		</tr>
		</table>";
}
else { 
	$arow=mysqli_query($conn, "SELECT * FROM members ORDER BY vip DESC");
	?>
	<table cellpadding="0" cellspacing="3" border="1" width="100%" bgcolor="#000">
    <tr><td><strong>ID</strong></td><td><strong>Nickname</strong></td><td><strong>Gold</strong></td><td><strong>Experience</strong></td><td><strong>Stamina</strong></td><td><strong>Character</strong></td><td><strong>Action</strong></td></tr>
    <?php
	while ($accountRow = mysqli_fetch_array($arow)) {
	$aName = $accountRow['nickname'];
	$aGold = $accountRow['gold'];
	$aTokens = $accountRow['tokens'];
	$aExperience = $accountRow['experience'];
	$aStamina = $accountRow['stamina'];
	$aCharacter = $accountRow['character'];
	$aID = $accountRow['ID'];
	$aVip = $accountRow['vip'];

    	echo"<tr><td>$aID</td><td>$aName</td><td>$aGold</td><td>$aExperience</td><td>$aStamina</td><td>$aCharacter</td><td><a href=\"home.php?page=updateaccount&a=$aID\">UPDATE</a></td></tr>";
	}
echo "</table>";
}
?>
