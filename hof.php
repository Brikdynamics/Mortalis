<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Mortalis - Hall of Fame</title>
</head>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
    <td>&nbsp;</td>
    <td colspan="3" style="background-image: url(hof/bgtop.png); background-size:100% 100%" valign="top"><img src="hof/hof.png" width="100%"></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td width="30%" rowspan="4" align="right" valign="bottom" style="background-image: url(hof/bgsecond.png); background-size:100% 100%"><?php
    ///PLAYER 2
	  $strongP2=mysqli_query($conn, "SELECT * FROM members ORDER BY experience DESC LIMIT 1,1");

   $strongestP2=mysqli_fetch_array($strongP2);
   $nicknameP2 = $strongestP2['nickname'];
	$experienceP2 = $strongestP2['experience'];
		$vipP2 = $strongestP2['vip'];

  $tempidP2 = $strongestP2['mortalis'];
   $moreP2=mysqli_query($conn, "SELECT * FROM mortalis WHERE ID=$tempidP2");
   $moreRowP2=mysqli_fetch_array($moreP2);
   $charidP2 = $moreRowP2['characterID'];
   $chreP2=mysqli_query($conn, "SELECT * FROM characters WHERE ID=$charidP2");
   $chreRowP2=mysqli_fetch_array($chreP2);
        $ctypeP2 = $chreRowP2['type'];
        $ciconP2 = "elements/" . $ctypeP2 . ".png";
		$nicknameP2 = strtoupper($nicknameP2);
		$nicknameP2 = "<strong>$nicknameP2</strong>";
   ?>
  
   <div style="background-image:url(images/hofbar.png); background-size:100% 100%; background-repeat:no-repeat; display:inline-block"><?php if ($vipP2 == 1) {
        echo"<p style=\"color: #446300\">&nbsp;&nbsp;<img src=\"$ciconP2\" width=\"30\"> $nicknameP2 VIP&nbsp;&nbsp;</p>";
		}
		elseif ($vipP2 == 3) {
			echo"<p style=\"color: #932\">&nbsp;&nbsp;<img src=\"$ciconP2\" width=\"30\"> $nicknameP2&nbsp;&nbsp;</p>";
		}
		elseif ($vipP2 == 5) {
			echo"<p style=\"color: #931\">&nbsp;&nbsp;<img src=\"$ciconP2\" width=\"30\"> $nicknameP2&nbsp;&nbsp;</p>";
		}
		elseif ($vipP2 == 9) {
			echo"<p style=\"color: #930\">&nbsp;&nbsp;<img src=\"$ciconP2\" width=\"30\"> $nicknameP2&nbsp;&nbsp;</p>";
		}
		else {
			echo"<p style=\"color: #000\">&nbsp;&nbsp;<img src=\"$ciconP2\" width=\"30\"> $nicknameP2&nbsp;&nbsp;</p>";
		} ?>
	  </div><br /><div style="background-image:url(images/exbar.png); background-size:100% 100%; background-repeat:no-repeat; display:inline-block"><p style=\"color: #930\">&nbsp;&nbsp;<strong><?php echo $experienceP2; ?></strong>XP&nbsp;&nbsp;</p></div><br />
   <img src="mortalis/<?php 
			  $morelevelP2 = $moreRowP2['experience'];
			  if ($morelevelP2 >= '100000') {
				  $morepicP2 = $chreRowP2['picture3'];
			  }
			  elseif ($morelevelP2 < '100000' && $morelevelP2 >= '40000') {
				  $morepicP2 = $chreRowP2['picture2'];
			  }
			  else {
              $morepicP2 = $chreRowP2['picture1'];
			  }
			  echo $morepicP2; ?>" width="60%"><img src="hof/second.png" width="100%" /></td>
    <td width="30%" rowspan="4" align="center" valign="bottom" style="background-image: url(hof/bgfirst.png); background-size:100% 100%"><br />
    <?php
    ///PLAYER 1
	  $strongP1=mysqli_query($conn, "SELECT * FROM members ORDER BY experience DESC LIMIT 0,1");

   $strongestP1=mysqli_fetch_array($strongP1);
   $nicknameP1 = $strongestP1['nickname'];
	$experienceP1 = $strongestP1['experience'];
		$vipP1 = $strongestP1['vip'];

  $tempidP1 = $strongestP1['mortalis'];
   $moreP1=mysqli_query($conn, "SELECT * FROM mortalis WHERE ID=$tempidP1");
   $moreRowP1=mysqli_fetch_array($moreP1);
   $charidP1 = $moreRowP1['characterID'];
   $chreP1=mysqli_query($conn, "SELECT * FROM characters WHERE ID=$charidP1");
   $chreRowP1=mysqli_fetch_array($chreP1);
        $ctypeP1 = $chreRowP1['type'];
        $ciconP1 = "elements/" . $ctypeP1 . ".png";
		$nicknameP1 = strtoupper($nicknameP1);
		$nicknameP1 = "<strong>$nicknameP1</strong>";
   ?>
   <div style="background-image:url(images/hofbar.png); background-size:100% 100%; background-repeat:no-repeat; display:inline-block"><?php if ($vipP1 == 1) {
        echo"<p style=\"color: #446300\">&nbsp;&nbsp;<img src=\"$ciconP1\" width=\"30\"> $nicknameP1 VIP&nbsp;&nbsp;</p>";
		}
		elseif ($vipP1 == 3) {
			echo"<p style=\"color: #932\">&nbsp;&nbsp;<img src=\"$ciconP1\" width=\"30\"> $nicknameP1&nbsp;&nbsp;</p>";
		}
		elseif ($vipP1 == 5) {
			echo"<p style=\"color: #931\">&nbsp;&nbsp;<img src=\"$ciconP1\" width=\"30\"> $nicknameP1&nbsp;&nbsp;</p>";
		}
		elseif ($vipP1 == 9) {
			echo"<p style=\"color: #930\">&nbsp;&nbsp;<img src=\"$ciconP1\" width=\"30\"> $nicknameP1&nbsp;&nbsp;</p>";
		}
		else {
			echo"<p style=\"color: #000\">&nbsp;&nbsp;<img src=\"$ciconP1\" width=\"30\"> $nicknameP1&nbsp;&nbsp;</p>";
		} ?>
	  </div><br /><div style="background-image:url(images/exbar.png); background-size:100% 100%; background-repeat:no-repeat; display:inline-block"><p style=\"color: #930\">&nbsp;&nbsp;<strong><?php echo $experienceP1; ?></strong>XP&nbsp;&nbsp;</p></div><br />
   <img src="mortalis/<?php 
			  $morelevelP1 = $moreRowP1['experience'];
			  if ($morelevelP1 >= '100000') {
				  $morepicP1 = $chreRowP1['picture3'];
			  }
			  elseif ($morelevelP1 < '100000' && $morelevelP1 >= '40000') {
				  $morepicP1 = $chreRowP1['picture2'];
			  }
			  else {
              $morepicP1 = $chreRowP1['picture1'];
			  }
			  echo $morepicP1; ?>" width="60%"><img src="hof/first.png" width="100%" /></td>
    <td style="background-image: url(hof/bgthird.png); background-size:100% 100%" width="30%" rowspan="4" align="left" valign="bottom"><?php
    ///PLAYER 3
	  $strongP3=mysqli_query($conn, "SELECT * FROM members ORDER BY experience DESC LIMIT 2,1");

   $strongestP3=mysqli_fetch_array($strongP3);
   $nicknameP3 = $strongestP3['nickname'];
	$experienceP3 = $strongestP3['experience'];
		$vipP3 = $strongestP3['vip'];

  $tempidP3 = $strongestP3['mortalis'];
   $moreP3=mysqli_query($conn, "SELECT * FROM mortalis WHERE ID=$tempidP3");
   $moreRowP3=mysqli_fetch_array($moreP3);
   $charidP3 = $moreRowP3['characterID'];
   $chreP3=mysqli_query($conn, "SELECT * FROM characters WHERE ID=$charidP3");
   $chreRowP3=mysqli_fetch_array($chreP3);
        $ctypeP3 = $chreRowP3['type'];
        $ciconP3 = "elements/" . $ctypeP3 . ".png";
		$nicknameP3 = strtoupper($nicknameP3);
		$nicknameP3 = "<strong>$nicknameP3</strong>";
   ?>
   <div style="background-image:url(images/hofbar.png); background-size:100% 100%; background-repeat:no-repeat; display:inline-block"><?php if ($vipP3 == 1) {
        echo"<p style=\"color: #446300\">&nbsp;&nbsp;<img src=\"$ciconP3\" width=\"30\"> $nicknameP3 VIP&nbsp;&nbsp;</p>";
		}
		elseif ($vipP3 == 3) {
			echo"<p style=\"color: #932\">&nbsp;&nbsp;<img src=\"$ciconP3\" width=\"30\"> $nicknameP3&nbsp;&nbsp;</p>";
		}
		elseif ($vipP3 == 5) {
			echo"<p style=\"color: #931\">&nbsp;&nbsp;<img src=\"$ciconP3\" width=\"30\"> $nicknameP3&nbsp;&nbsp;</p>";
		}
		elseif ($vipP3 == 9) {
			echo"<p style=\"color: #930\">&nbsp;&nbsp;<img src=\"$ciconP3\" width=\"30\"> $nicknameP3&nbsp;&nbsp;</p>";
		}
		else {
			echo"<p style=\"color: #000\">&nbsp;&nbsp;<img src=\"$ciconP3\" width=\"30\"> $nicknameP3&nbsp;&nbsp;</p>";
		} ?>
	  </div><br /><div style="background-image:url(images/exbar.png); background-size:100% 100%; background-repeat:no-repeat; display:inline-block"><p style=\"color: #930\">&nbsp;&nbsp;<strong><?php echo $experienceP3; ?></strong>XP&nbsp;&nbsp;</p></div><br />
   <img src="mortalis/<?php 
			  $morelevelP3 = $moreRowP3['experience'];
			  if ($morelevelP3 >= '100000') {
				  $morepicP3 = $chreRowP3['picture3'];
			  }
			  elseif ($morelevelP3 < '100000' && $morelevelP3 >= '40000') {
				  $morepicP3 = $chreRowP3['picture2'];
			  }
			  else {
              $morepicP3 = $chreRowP3['picture1'];
			  }
			  echo $morepicP3; ?>" width="60%">    <img src="hof/third.png" width="100%" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="5%">&nbsp;</td>
    <td width="5%">&nbsp;</td>
  </tr>
  <tr>
    <td height="100%">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
</td>
   <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
    <?php
	 
$stronglist=mysqli_query($conn, "SELECT * FROM members ORDER BY experience DESC LIMIT 3,97");
$hoeveellist = 3;
	while ($strongestlist = mysqli_fetch_array($stronglist)) {
   $nicknamelist = $strongestlist['nickname'];
	$experiencelist = $strongestlist['experience'];
		$viplist = $strongestlist['vip'];
		
$hoeveellist++;

  $tempidlist = $strongestlist['mortalis'];
   $morelist=mysqli_query($conn, "SELECT * FROM mortalis WHERE ID=$tempidlist");
   $moreRowlist=mysqli_fetch_array($morelist);
   $charidlist = $moreRowlist['characterID'];
   $chrelist=mysqli_query($conn, "SELECT * FROM characters WHERE ID=$charidlist");
   $chreRowlist=mysqli_fetch_array($chrelist);
        $ctypelist = $chreRowlist['type'];
        $ciconlist = "elements/" . $ctypelist . ".png";
   ?>
     <tr>
    <td>&nbsp;</td><td colspan="3" align="center"><table width="80%" bgcolor="#FFCC00" cellpadding="3" cellspacing="0" border="0"><tr>
    <td width="40" style="color: #000; font-size:20px"><strong>#<?php echo $hoeveellist; ?></strong></td>
   <?php if ($viplist == 1) {
        echo"<td style=\"color: #446300; font-size:20px\" width=\"20%\"><img src=\"$ciconlist\" width=\"30\"> <strong>$nicknamelist VIP</strong>";
		}
		elseif ($viplist == 3) {
			echo"<td style=\"color: #932; font-size:20px\" width=\"20%\"><img src=\"$ciconlist\" width=\"30\"> <strong>$nicknamelist</strong>";
		}
		elseif ($viplist == 5) {
			echo"<td style=\"color: #931; font-size:20px\" width=\"20%\"><img src=\"$ciconlist\" width=\"30\"> <strong>$nicknamelist</strong>";
		}
		elseif ($viplist == 9) {
			echo"<td style=\"color: #930; font-size:20px\" width=\"20%\"><img src=\"$ciconlist\" width=\"30\"> <strong>$nicknamelist</strong>";
		}
		else {
			echo"<td style=\"color: #000; font-size:20px\" width=\"20%\"><img src=\"$ciconlist\" width=\"30\"> <strong>$nicknamelist</strong>";
		} ?>
   <img src="characters/<?php 
			  $morelevellist = $moreRowlist['experience'];
			  if ($morelevellist >= '100000') {
				  $morepiclist = $chreRowlist['picture3'];
			  }
			  elseif ($morelevellist < '100000' && $morelevellist >= '40000') {
				  $morepiclist = $chreRowlist['picture2'];
			  }
			  else {
              $morepiclist = $chreRowlist['picture1'];
			  }
			  echo $morepiclist; ?>" width="100"></td>
              
       <td><strong>Experience:</strong><br /><?php echo $experiencelist; ?></td>
       </tr></table></tr>
              <td>&nbsp;</td>
  </tr>
              <?php
	}
	?>
    <tr>
    <td>&nbsp;</td>
    <td colspan="3">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<p>&nbsp;</p>
</body>
</html>
