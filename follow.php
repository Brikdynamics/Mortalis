<?php
 ob_start();
 session_start();
 
 include_once 'dbconnect.php';

?>
<!DOCTYPE html>
<html>
<head>
<link rel="shortcut icon" href="favicon.ico" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php 
$identiteit = $_GET['x'];
$hoevelcharacters = 0;
$verd=mysqli_query($conn, "SELECT * FROM members WHERE ID=$identiteit");
while ($speler = mysqli_fetch_array($verd)) {
	$naamspeler = $speler['nickname'];
	$characterspeler = $speler['character'];
	$mortalisspeler = $speler['mortalis'];
$chr=mysqli_query($conn, "SELECT * FROM characters WHERE ID=$characterspeler");
while ($character = mysqli_fetch_array($chr)) {
	$cID = $character['ID'];
	$cname = $character['name1'];
    $ctype = $character['type'];
	$cicon = "elements/" . $ctype . ".png";
    $cinformation = $character['information1'];
    $cpicture = $character['picture1'];
	$naamspeler = strtoupper($naamspeler);
	$mort=mysqli_query($conn, "SELECT * FROM mortalis WHERE ID=$mortalisspeler");
	while ($mortalis = mysqli_fetch_array($mort)) {
	?>
<title><?php echo "$naamspeler NEEDS BACKUP!"; ?></title>
<meta name="description" content="<?php echo $naamspeler; ?> is playing on Mortalis.nl and could really use your help. Join <?php echo $naamspeler; ?> for FREE with your own Mortalis.">
</head>
<body>
<table border="0" cellpadding="5" cellspacing="0" style="color:#FFF" bgcolor="#666666" width="240" align="center">
  <tr>
    <td colspan="2" align="center" background="images/charbar.png" bgcolor="#FFF" style="color: #FFF; font-size: 30px; font: Arial, Helvetica, sans-serif; background-size: cover; font-family: 'Comic Sans MS', cursive;" valign="top"><img src="<?php echo $cicon ?>" width="30"> <strong><?php echo $cname; ?></strong></td>>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="center"><img src="<?php echo $cicon ?>" width="20"> <strong><?php echo $mortRow['nickname']; ?></strong><br><img src="characters/<?php
			  $morlevel = $mortalis['experience'];
			  $mortID = $mortalis['ID'];
			  if ($morlevel >= '100000') {
				  $morpic = $character['picture3'];
			  }
			  elseif ($morlevel < '100000' && $morlevel >= '40000') {
				  $morpic = $character['picture2'];
			  }
			  else {
              $morpic = $character['picture1'];
			  }
			  echo $morpic; ?>" width="100%">  </td>
  </tr>
  <tr>
    <td colspan="2" align="center">KLIK OM DEZE SPELER TE VOLGEN</td>
  </tr>
  <tr>
    <td width="50%" align="center">KLIK OM JE IN TE LOGGEN</td>
    <td width="50%" align="center">REGISTREREN HIER</td>
  </tr>
</table>
</body>
</html>
<?php } 
}
}?>
<?php
ob_end_flush(); ?>