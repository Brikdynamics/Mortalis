<?php
 include_once 'dbconnect.php';
$q = intval($_GET['q']);
$sql="SELECT * FROM characters WHERE ID = '".$q."'";
$result = mysqli_query($conn,$sql);

while($character = mysqli_fetch_array($result)) {
	$cID = $character['ID'];
	$cname = $character['name1'];
    $ctype = $character['type'];
	$cicon = "elements/" . $ctype . ".png";
    $cinformation = $character['information1'];
    $cattack = $character['attack'];
    $cdefense = $character['defense'];
    $cworking = $character['working'];
    $ctracking = $character['tracking'];
    $cdiving = $character['diving'];
    $cfishing = $character['fishing'];
    $chunting = $character['hunting'];
    $cdigging = $character['digging'];
    $cpicture = $character['picture1'];
	?>
<table width="100%" border="0" cellpadding="0" cellspacing="0" align="left">
              <tr valign="top">
                
                  <td><table border="0" cellpadding="5" cellspacing="0" style="color:#FFF" bgcolor="#CC6600">
                    <tr>
                      <td colspan="2" height="50" align="center" bgcolor="#CC6600"  style="color: #FFF; font-size: 30px; font: Arial, Helvetica, sans-serif; background-size: cover; font-family: 'Comic Sans MS', cursive;" valign="top"><img src="<?php echo $cicon ?>" width="30"> <strong><?php echo $cname; ?></strong></td>
                    </tr>
                    <tr>
                      <td colspan="2" bgcolor="#CC6600"><img src="characters/<?php echo $cpicture; ?>" width="100%"></td>
                    </tr>
                    <tr>
                      <td colspan="2" align="center" bgcolor="#CC6600" style="color: #000; font-size: 18px; font: Arial, Helvetica, sans-serif; background-size: cover; font-family: 'Comic Sans MS', cursive;" valign="middle"><strong>Skillset</strong></td>
                    </tr>
                    <tr bgcolor="#444">
                      <td><strong>Attack:</strong></td>
                      <td><progress value="<?php echo $cattack; ?>" max="50"></progress></td>
                    </tr>
                    <tr bgcolor="#444">
                      <td><strong>Defense:</strong></td>
                      <td><progress value="<?php echo $cdefense; ?>" max="50"></progress></td>
                    </tr>
                    <tr bgcolor="#444">
                      <td><strong>Working:</strong></td>
                      <td><progress value="<?php echo $cworking; ?>" max="50"></progress></td>
                    </tr>
                    <tr bgcolor="#444">
                      <td><strong>Tracking:</strong></td>
                      <td><progress value="<?php echo $ctracking; ?>" max="50"></progress></td>
                    </tr>
                    <tr bgcolor="#444">
                      <td><strong>Diving:</strong></td>
                      <td><progress value="<?php echo $cdiving; ?>" max="50"></progress></td>
                    </tr>
                    <tr bgcolor="#444">
                      <td><strong>Fishing:</strong></td>
                      <td><progress value="<?php echo $cfishing; ?>" max="50"></progress></td>
                    </tr>
                    <tr bgcolor="#444">
                      <td width="80" ><strong>Hunting:</strong></td>
                      <td><progress value="<?php echo $chunting; ?>" max="50"></progress></td>
                    </tr>
                    <tr bgcolor="#444">
                      <td><strong>Digging:</strong></td>
                      <td><progress value="<?php echo $cdigging; ?>" max="50"></progress></td>
                    </tr>
                    <tr bgcolor="#999999">
                      <td colspan="2"><strong>INFO: </strong><?php echo $cinformation; ?></td>
                    </tr>
                  </table><br>
				<?php	
				}
			
mysqli_close($con);
?>