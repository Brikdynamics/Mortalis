<table bgcolor="#000000" width="100%" border="0" cellspacing="0" cellpadding="5">
  <tr>
    <td width="20%">&nbsp;</td>
    <td align="center"><h2>Hall of fame</h2></td>
    <td width="20%">&nbsp;</td>
  </tr>
</table>
<table bgcolor="#000000" width="100%" border="0" cellspacing="0" cellpadding="5">
    <tr>
	<?php 
	$hoevelcharacters = 0;
	while ($strongest = mysqli_fetch_array($strong)) {
		$nickname = $strongest['nickname'];
		$experience = $strongest['experience'];
		$vip = $strongest['vip'];

  $tempid = $strongest['mortalis'];
   $more=mysqli_query($conn, "SELECT * FROM mortalis WHERE ID=$tempid");
   $moreRow=mysqli_fetch_array($more);
   $charid = $moreRow['characterID'];
   $chre=mysqli_query($conn, "SELECT * FROM characters WHERE ID=$charid");
   $chreRow=mysqli_fetch_array($chre);
        $ctype = $chreRow['type'];
        $cicon = "elements/" . $ctype . ".png";
  ?>
  <td width="20%">
<table border="0" cellpadding="5" cellspacing="0" style="color:#FFF" bgcolor="#666666" width="240">
                    <tr>
                      <td colspan="2" height="40" align="center" background="images/charbar.png" bgcolor="#FFF" style="color: #FFF; font-size: 30px; font: Arial, Helvetica, sans-serif; background-size: cover; font-family: 'Comic Sans MS', cursive;" valign="top">
        <strong><?php if ($vip == 1) {
        echo"<p style=\"color: #446300\"><img src=\"$cicon\" width=\"30\"> $nickname VIP</p>";
		}
		elseif ($vip == 3) {
			echo"<p style=\"color: #932\"><img src=\"$cicon\" width=\"30\"> $nickname</p>";
		}
		elseif ($vip == 5) {
			echo"<p style=\"color: #931\"><img src=\"$cicon\" width=\"30\"> $nickname</p>";
		}
		elseif ($vip == 9) {
			echo"<p style=\"color: #930\"><img src=\"$cicon\" width=\"30\"> $nickname</p>";
		}
		else {
			echo"<p style=\"color: #000\"><img src=\"$cicon\" width=\"30\"> $nickname</p>";
		} ?>
		</strong></td>
                    </tr>
                    <tr>
                      <td colspan="2"><img src="characters/<?php 
			  $morelevel = $moreRow['experience'];
			  if ($morelevel >= '100000') {
				  $morepic = $chreRow['picture3'];
			  }
			  elseif ($morelevel < '100000' && $morelevel >= '40000') {
				  $morepic = $chreRow['picture2'];
			  }
			  else {
              $morepic = $chreRow['picture1'];
			  }
			  echo $morepic; ?>" width="100%"></td>
                    </tr>
                    <tr>
                      <td colspan="2" height="57" align="center" background="images/charbar2.png" bgcolor="#FFF" style="color: #000; font-size: 18px; font: Arial, Helvetica, sans-serif; background-size: cover; font-family: 'Comic Sans MS', cursive;" valign="middle"><strong>Skillset</strong></td>
                    </tr>
                    <tr bgcolor="#444">
                      <td><strong>Experience:</strong></td>
                      <td><progress value="<?php echo $morelevel; ?>" max="100000"></progress></td>
                    </tr>
                      <tr>
   <td colspan="2" align="center"><a href="profile.php?id=<?php echo $strongest['ID']; ?>">View Profile</a></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><a href="attack.php?id=<?php echo $strongest['ID']; ?>">Attack player</a></td>
  </tr>
                  </table>
                  </td>
 <?php 		$hoevelcharacters++;
 				if ($hoevelcharacters == '3') {
					$hoevelcharacters = 0;
					echo"</tr><tr>";
					
				}
				
				}?>
</tr></table>
