<?php
 ob_start();
 session_start();
 require_once 'dbconnect.php';
 
 // if session is not set this will redirect to login page
 if( !isset($_SESSION['user']) ) {
  header("Location: index.php");
  exit;
 }
 // select loggedin users detail
 $res=mysqli_query($conn, "SELECT * FROM members WHERE ID=".$_SESSION['user']);
 $userRow=mysqli_fetch_array($res);
 $userID = $userRow['mortalis'];
 $mor=mysqli_query($conn, "SELECT * FROM mortalis WHERE ID=$userID");
 $mortRow=mysqli_fetch_array($mor);
 $characterID = $mortRow['characterID'];
 $cha=mysqli_query($conn, "SELECT * FROM characters WHERE ID=$characterID");
 $charRow=mysqli_fetch_array($cha);
 
  $strong=mysqli_query($conn, "SELECT * FROM members ORDER BY experience DESC LIMIT 3");
  $lessstrong=mysqli_query($conn, "SELECT * FROM members ORDER BY experience DESC LIMIT 97, 3");
    $morstrong=mysqli_query($conn, "SELECT * FROM mortalis ORDER BY experience DESC LIMIT 5");
	$lessmorstrong=mysqli_query($conn, "SELECT * FROM mortalis ORDER BY experience DESC LIMIT 97, 3");
?>
<!DOCTYPE html>
<html>
<head>
<link rel="shortcut icon" href="favicon.ico" />
 <link rel="icon" type="image/png" href="favicon.png">

<style type="text/css">
body,td,th {
	font-family: Verdana, Geneva, sans-serif;
	color: #FFF;
}
body {
	background-color:#000;
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
}
a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
a:hover {
	text-decoration: none;
}
a:active {
	text-decoration: none;
}
.Fixed2
{
    position: fixed;
    top: 0px;
	height: 20px;
	background-color: #333;
	width: 100%;
}
.Fixed
{
    position:fixed;
    top: 20px;
	width: 100%;
	    background: rgb(68, 68, 68); /* Fall-back for browsers that don't
                                    support rgba */
    background: rgba(68, 68, 68, .8);
	width: 100%;
}
.link_button {
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    border-radius: 4px;
    border: solid 1px #20538D;
    text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.4);
    -webkit-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.4), 0 1px 1px rgba(0, 0, 0, 0.2);
    -moz-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.4), 0 1px 1px rgba(0, 0, 0, 0.2);
    box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.4), 0 1px 1px rgba(0, 0, 0, 0.2);
    background: #C60;
    color: #000;
    padding: 8px 12px;
    text-decoration: none;
	font:Tahoma, Geneva, sans-serif;
	font-size:18px;
}
/* Style van de dropdown knop */
.dropbtn {
	background-color: #ff9c00;
	color: #FFFFFF;
	font-size: 20px;
	font-family: Verdana;
	font-weight: bold;
	padding: 14px;
	border: none;
	cursor: pointer;
}
/* Style van de dropdown knop */
.dropbtngold {
	 background-color: Transparent;
    background-repeat:no-repeat;
    border: none;
    cursor:pointer;
    overflow: hidden;
    outline:none;
	font-size: 14px;
	font-family: Verdana;
	font-weight: bold;
	padding: 0px;
}

/* De container div is nodig om de positie te bepalen */
.dropdown {
	position: relative;
	display: inline-block;
}
/* De container div is nodig om de positie te bepalen */
.dropdownleft {
	position: relative;
	display: inline-block;
}
.dropdowncenter {
	position: relative;
	display: inline-block;
}

/* dropdown content hidden by default */
.dropdown-content {
	color: black;
	display: none;
	position: absolute;
	background-color: #FFC;
	min-width: 160px;
	box-shadow: 0px 8px 16px 0px rgba(0.0.0.2);
}

/* links in de dropdown */
.dropdown-content a {
	color: black;
	padding: 12px 16px;
	text-decoration: none;
	display: block;
}

/* change color of dropdownlinks on hover */
.dropdown-content a:hover {
	background-color: #f1f1f1;
}

/* laat de dropbox zien als je eroverheengaat met de muis */
.dropdown:hover .dropdown-content {
	display: block;
	overflow: auto;
	max-height: 90vh;
}
/*HIER ALLES NEP */
/* dropdown content hidden by default */
.dropdown-content-left {
	color: black;
	display: none;
	position: absolute;
	background-color: #FFC;
	min-width: 160px;
	box-shadow: 0px 8px 16px 0px rgba(0.0.0.2);
}

/* links in de dropdown */
.dropdown-content-left a {
	color: black;
	padding: 12px 16px;
	text-decoration: none;
	display: block;
}

/* change color of dropdownlinks on hover */
.dropdown-content-left a:hover {
	background-color: #f1f1f1;
}

/* laat de dropbox zien als je eroverheengaat met de muis */
.dropdownleft:hover .dropdown-content-left {
	display: block;
	left:auto; 
	right:0;
	overflow: auto;
	max-height: 90vh;
}
/*HIER ALLES NEP */
/* dropdown content hidden by default */
.dropdown-content-center {
	color: black;
	display: none;
	position: absolute;
	background-color: #FFC;
	min-width: 160px;
	box-shadow: 0px 8px 16px 0px rgba(0.0.0.2);
}

/* links in de dropdown */
.dropdown-content-center a {
	color: black;
	padding: 12px 16px;
	text-decoration: none;
	display: block;
}

/* change color of dropdownlinks on hover */
.dropdown-content-center a:hover {
	background-color: #f1f1f1;
}

/* laat de dropbox zien als je eroverheengaat met de muis */
.dropdowncenter:hover .dropdown-content-center {
	display: block;
	left:auto;
	right:-125;
	overflow: auto;
	max-height: 90vh;
}

/* change achtergrond van de dropdown als de content zichtbaar is */
.dropdown:hover .dropbtn {
	background-color: #005daa;
}
progress {
  background-color:#960;
  border: 0;
  width: 125px;
}
#content {
  width: 250px ;
  margin-left: auto ;
  margin-right: auto ;
}
</style>
<style>
/* style van de achtergrond */
.logotje {
	background-size: cover;
}
.data-table {

    display: inline-block;
}
</style>
<style>
@import url(http://fonts.googleapis.com/css?family=Open+Sans);
.skillbar {
  font-family: 'Open Sans', 'sans-serif';
	position:relative;
	display:block;
	margin-bottom:15px;
	width:100%;
	background:#eee;
	height:35px;
	border-radius:3px;
	-moz-border-radius:3px;
	-webkit-border-radius:3px;
	-webkit-transition:0.4s linear;
	-moz-transition:0.4s linear;
	-ms-transition:0.4s linear;
	-o-transition:0.4s linear;
	transition:0.4s linear;
	-webkit-transition-property:width, background-color;
	-moz-transition-property:width, background-color;
	-ms-transition-property:width, background-color;
	-o-transition-property:width, background-color;
	transition-property:width, background-color;
}

.skillbar-title {
	position:absolute;
	top:0;
	left:0;
	font-weight:bold;
	font-size:13px;
	color:#fff;
	-webkit-border-top-left-radius:3px;
	-webkit-border-bottom-left-radius:4px;
	-moz-border-radius-topleft:3px;
	-moz-border-radius-bottomleft:3px;
	border-top-left-radius:3px;
	border-bottom-left-radius:3px;
}

.skillbar-title span {
	display:block;
	background:rgba(0, 0, 0, 0.1);
	padding:0 20px;
	height:35px;
	line-height:35px;
	-webkit-border-top-left-radius:3px;
	-webkit-border-bottom-left-radius:3px;
	-moz-border-radius-topleft:3px;
	-moz-border-radius-bottomleft:3px;
	border-top-left-radius:3px;
	border-bottom-left-radius:3px;
}

.skillbar-bar {
	height:35px;
	width:0px;
	background:#6adcfa;
	border-radius:3px;
	-moz-border-radius:3px;
	-webkit-border-radius:3px;
}

.skill-bar-percent {
	position:absolute;
	right:10px;
	top:0;
	font-size:11px;
	height:35px;
	line-height:35px;
	color:#444;
	color:rgba(0, 0, 0, 0.4);
}
</style>
<style>
@import url(http://fonts.googleapis.com/css?family=Open+Sans);
.mortskillbar {
  font-family: 'Open Sans', 'sans-serif';
	position:relative;
	display:block;
	margin-bottom:10px;
	width:100%;
	background:#eee;
	height:25px;
	border-radius:3px;
	-moz-border-radius:3px;
	-webkit-border-radius:3px;
	-webkit-transition:0.4s linear;
	-moz-transition:0.4s linear;
	-ms-transition:0.4s linear;
	-o-transition:0.4s linear;
	transition:0.4s linear;
	-webkit-transition-property:width, background-color;
	-moz-transition-property:width, background-color;
	-ms-transition-property:width, background-color;
	-o-transition-property:width, background-color;
	transition-property:width, background-color;
}

.mortskillbar-title {
	position:absolute;
	top:0;
	left:0;
	font-weight:bold;
	font-size:13px;
	color:#fff;
	-webkit-border-top-left-radius:3px;
	-webkit-border-bottom-left-radius:4px;
	-moz-border-radius-topleft:3px;
	-moz-border-radius-bottomleft:3px;
	border-top-left-radius:3px;
	border-bottom-left-radius:3px;
}

.mortskillbar-title span {
	display:block;
	background:rgba(0, 0, 0, 0.1);
	padding:0 20px;
	height:25px;
	line-height:25px;
	-webkit-border-top-left-radius:3px;
	-webkit-border-bottom-left-radius:3px;
	-moz-border-radius-topleft:3px;
	-moz-border-radius-bottomleft:3px;
	border-top-left-radius:3px;
	border-bottom-left-radius:3px;
}

.mortskillbar-bar {
	height:25px;
	width:0px;
	background:#6adcfa;
	border-radius:3px;
	-moz-border-radius:3px;
	-webkit-border-radius:3px;
}

.mortskill-bar-percent {
	position:absolute;
	right:10px;
	top:0;
	font-size:11px;
	height:35px;
	line-height:35px;
	color:#444;
	color:rgba(0, 0, 0, 0.4);
}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="jquery.appear.js"></script>
 <script>
function attack1 () {
$.ajax( { type : 'POST',
          data : { },
          url  : 'attack1.php',              // <=== CALL THE PHP FUNCTION HERE.
          success: function ( data ) {
        //    alert( data );               // <=== VALUE RETURNED FROM FUNCTION.
          },
          error: function ( xhr ) {
            alert( "error" );
          }
        });
}
</script>
<script>
jQuery(document).ready(function(){
    jQuery('.skillbar').each(function(){
        jQuery(this).appear(function() {
            jQuery(this).find('.skillbar-bar').animate({
                width:jQuery(this).attr('data-percent')
            },2000);
        });
    });
});
</script>
<script>
jQuery(document).ready(function(){
    jQuery('.mortskillbar').each(function(){
        jQuery(this).appear(function() {
            jQuery(this).find('.mortskillbar-bar').animate({
                width:jQuery(this).attr('data-percent')
            },2000);
        });
    });
});
</script>
<meta name=viewport content='width=600'>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Mortalis Game</title>
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"  />
</head>
<body>
<div class="Fixed2" align="center">
<img src="images/mortalis2.png" height="20">
</div>
<div class="Fixed">
<table width="100%" border="0" cellpadding="0" cellspacing="5" height="50">
<tr valign="middle"><td align="left">
<div class="dropdown">
			<button class="dropbtn"><?php echo $userRow['nickname']; ?></strong></button>
			<div class="dropdown-content" align="left" style="z-index: 2">
                <?php
				echo"<a href=\"home.php?page=digging\"><img src=\"vip.png\" width=\"16\">Go Digging</a>";
				echo"<a href=\"home.php?page=tracking\"><img src=\"vip.png\" width=\"16\">Track some</a>";
				$userlevel = $userRow['vip'];
				if ($userlevel == 1) {
					echo "<a href=\"profile.php\"><hr size=\"1\"></a>";
					echo "<a href=\"profile.php\"><img src=\"vip.png\" width=\"16\">Vip Store</a>";
					echo "<a href=\"profile.php\"><hr size=\"1\"></a>";
					
				}
				elseif ($userlevel == 3) {
					echo "<a href=\"profile.php\"><hr size=\"1\"></a>";
					echo "<a href=\"profile.php\"><img src=\"vip.png\" width=\"16\">Help 1</a>";
					echo "<a href=\"profile.php\"><img src=\"vip.png\" width=\"16\">Help 2</a>";
					echo "<a href=\"profile.php\"><hr size=\"1\"></a>";
				}
				elseif ($userlevel == 5) {
					echo "<a href=\"profile.php\"><hr size=\"1\"></a>";
					echo "<a href=\"profile.php\"><img src=\"vip.png\" width=\"16\">Operator 1</a>";
					echo "<a href=\"profile.php\"><img src=\"vip.png\" width=\"16\">Operator 2</a>";
					echo "<a href=\"profile.php\"><hr size=\"1\"></a>";
				}
				elseif ($userlevel == 9) {
					echo "<a href=\"profile.php\"><hr size=\"1\"></a>";
					echo "<a href=\"home.php?page=admin\"><img src=\"vip.png\" width=\"16\">Admin Panel</a>";
					echo "<a href=\"home.php?page=updateplayer\"><img src=\"vip.png\" width=\"16\">Change Account</a>";
					echo "<a href=\"home.php?page=updateaccount\"><img src=\"vip.png\" width=\"16\">Change Player</a>";
					echo "<a href=\"home.php?page=addbonus\"><img src=\"vip.png\" width=\"16\">Add Bonus</a>";
					echo "<a href=\"https://s193.webhostingserver.nl/phpmyadmin/index.php\"><img src=\"vip.png\" width=\"16\">MYSQL</a>";
					
					echo "<a href=\"home.php?page=addcharacter\"><img src=\"vip.png\" width=\"16\">Add Character</a>";
					echo "<a href=\"home.php?page=test\"><img src=\"vip.png\" width=\"16\">Test Page</a>";
					echo "<a href=\"profile.php\"><hr size=\"1\"></a>";
				}
				else {
					halt;
				}
				?>
                   <a href="home.php?page=bonus">Submit Bonuscode</a><br>
                   <a href="home.php?page=findbonus">Find Bonus</a><br>
                   
                <a href="logout.php?logout"><img src="images/logout.png" width="16"> <strong>Logout</strong></a>
			</div></div>
            </td><td align="left" style="color:#000">
             <div class="dropdown">
                          
             <?php // HIER DE POWERBUTTON ?>
             
			<button class="dropbtngold"><img src="images/power.png" width="100%" style="max-height:80px; max-width:71px"></button>
			<div class="dropdown-content" align="left" style="z-index: 2">
             <p align="center" style="background-image: url(images/charbar.png); background-size:cover; margin: 0; padding: 0; width:250px; height:57px"><strong>
             <?php echo $userRow['nickname']; ?>&rsquo;s account<br>
                    Level:</strong> <?php 
				$exp = $userRow['experience'];
				if ($exp < 500) {
					$level = 1;
					$level2 = 500;
                    $level3 = "Sprout";
					$beginlevel = 1;
				}
				elseif ($exp >= 500 && $exp < 1000) {
					$level = 2;
					$level2 = 1000;
                    $level3 = "Rookie";
					$beginlevel = 500;
				}
				elseif ($exp >= 1000 && $exp < 2000) {
					$level = 3;
					$level2 = 2000;
                    $level3 = "Rookie";
					$beginlevel = 1000;
				}
				elseif ($exp >= 2000 && $exp < 3000) {
					$level = 4;
					$level2 = 3000;
                    $level3 = "Rookie";
					$beginlevel = 2000;
				}
				elseif ($exp >= 3000 && $exp < 5000) {
					$level = 5;
					$level2 = 5000;
                    $level3 = "Soldier";
					$beginlevel = 3000;
				}
				elseif ($exp >= 5000 && $exp < 7500) {
					$level = 6;
					$level2 = 7500;
                    $level3 = "Soldier";
					$beginlevel = 5000;
				}
				elseif ($exp >= 7500 && $exp < 10000) {
					$level = 7;
					$level2 = 10000;
                    $level3 = "Soldier";
					$beginlevel = 7500;
				}
				elseif ($exp >= 10000 && $exp < 12500) {
					$level = 8;
					$level2 = 12500;
                    $level3 = "Soldier";
					$beginlevel = 10000;
				}
				elseif ($exp >= 12500 && $exp < 15000) {
					$level = 9;
					$level2 = 15000;
                    $level3 = "Soldier";
					$beginlevel = 12500;
				}
				elseif ($exp >= 15000 && $exp < 20000) {
					$level = 10;
					$level2 = 20000;
                    $level3 = "Corporal";
					$beginlevel = 15000;
				}
				elseif ($exp >= 20000 && $exp < 25000) {
					$level = 11;
					$level2 = 25000;
                    $level3 = "Corporal";
					$beginlevel = 20000;
				}
				elseif ($exp >= 25000 && $exp < 30000) {
					$level = 12;
					$level2 = 30000;
                    $level3 = "Corporal";
					$beginlevel = 25000;
				}
				elseif ($exp >= 30000 && $exp < 35000) {
					$level = 13;
					$level2 = 35000;
                    $level3 = "Corporal";
					$beginlevel = 30000;
				}
				elseif ($exp >= 35000 && $exp < 40000) {
					$level = 14;
					$level2 = 40000;
                    $level3 = "Corporal First Class";
					$beginlevel = 35000;
				}
				elseif ($exp >= 40000 && $exp < 50000) {
					$level = 15;
					$level2 = 50000;
                    $level3 = "Sergeant";
					$beginlevel = 40000;
				}
				elseif ($exp >= 50000 && $exp < 60000) {
					$level = 16;
					$level2 = 60000;
                    $level3 = "Sergeant";
					$beginlevel = 50000;
				}
				elseif ($exp >= 60000 && $exp < 70000) {
					$level = 17;
					$level2 = 70000;
                    $level3 = "Sergeant First Class";
					$beginlevel = 60000;
				}
				elseif ($exp >= 70000 && $exp < 80000) {
					$level = 18;
					$level2 = 80000;
                    $level3 = "Sergeant First Class";
					$beginlevel = 70000;
				}
				elseif ($exp >= 80000 && $exp < 90000) {
					$level = 19;
					$level2 = 90000;
                    $level3 = "Sergeant Major";
					$beginlevel = 80000;
				}
				elseif ($exp >= 90000 && $exp < 100000) {
					$level = 20;
					$level2 = 100000;
                    $level3 = "Officer Kadet";
					$beginlevel = 90000;
				}
				elseif ($exp >= 100000 && $exp < 110000) {
					$level = 21;
					$level2 = 110000;
                    $level3 = "Second Luitenant";
					$beginlevel = 100000;
                    // https://en.wikipedia.org/wiki/Military_ranks_of_the_Dutch_armed_forces HIER VANDAAN GEHAALD
				}
				else {
					$level = 1;
				}
				$level5 = $level + 1;
				$level4 = $level2 - $exp;
				$beginlevel = $exp - $beginlevel;
				$myprogressbar = 100 / $level2 * $exp;
				echo "$level ($level3)";
                ?>
                </p> 
                <?php
                $experience = $userRow['experience'];
                echo"<a href=\"home.php?page=myprofile\"><strong>Experience:</strong> $experience<br><progress value=\"$beginlevel\" max=\"$level2\"></progress><i>($exp/$level2)<br><strong>$level4</strong>xp for Lvl.$level5</i>"; ?></a>
                <p align="center" style="background-image: url(images/charbar.png); background-size:cover; margin: 0; padding: 0; width:250px; height:57px">
                  <strong>Playerstats</strong> </p>
                <a href=\"home.php?page=myprofile\"><img src="images/attack.png" width="16"> Attack: <?php echo $userRow['power']; ?><br>
                <img src="images/defense.png" width="16"> Defense: <?php echo $userRow['defense']; ?><br>
                <img src="images/power.png" width="16"> Power: <?php echo ($userRow['power'] * 1.77) + ($userRow['defense'] * 1.36) * 1.50; ?><br>
               <img src="images/follow.png" width="16"> Follows: <?php echo $userRow['follow']; ?></a>
                
                <a href="profile.php"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="color:#000"><strong>Tokens</strong></td>
    <td style="color:#000"><strong>Euro</strong></td>
  </tr>
  <tr>
    <td style="color:#000"><strong>&Psi; </strong><?php echo $userRow['tokens']; ?></td>
    <td style="color:#000"><strong>&euro; </strong><?php
$pleuro = round($userRow['tokens'] / 100,2); 
echo $pleuro; ?></td>
  </tr>
</table></a>
			</div>
 </td><td align="left" style="color:#000">
             <div class="dropdowncenter">
             
             <?php // HIER DE CREATURE INFO
			 $ctype = $mortRow['type'];
			 $cicon = "elements/" . $ctype . ".png"; ?>
             
             <button class="dropbtngold"><img src="images/creature.png" width="100%" style="max-height:80px; max-width:71px"></button>
			<div class="dropdown-content-center" align="left" style="z-index: 2">
            <p align="center" style="background-image: url(images/charbar.png); background-size:cover; margin: 0; padding: 0; width:250px; height:57px"><img src="<?php echo $cicon ?>" width="20"> <strong><?php echo $mortRow['nickname']; ?></strong><br>(<?php 
			$morlevel = $mortRow['experience'];
			  if ($morlevel >= '100000') {
				  $morpic = $charRow['name3'];
			  }
			  elseif ($morlevel < '100000' && $morlevel >= '40000') {
				  $morpic = $charRow['name2'];
			  }
			  else {
              $morpic = $charRow['name1'];
			  } 
			  echo $morpic; ?>)</p>
				<div id="content" align="center" style="background-size:cover; width:250; height:167; background-repeat:no-repeat; position:relative; background-image:url(characters/<?php 
			  $morlevel = $mortRow['experience'];
			  $mortID = $mortRow['ID'];
			  if ($morlevel >= '100000') {
				  $morpic = $charRow['picture3'];
			  }
			  elseif ($morlevel < '100000' && $morlevel >= '40000') {
				  $morpic = $charRow['picture2'];
			  }
			  else {
              $morpic = $charRow['picture1'];
			  }
			  echo $morpic; ?>)">       
                <?php 
				$mortexp = $mortRow['experience'];
				if ($mortexp < 250) {
					$mortlevel = 1;
					$mortlevel2 = 250;
					$mortbeginlevel = 1;
				}
				elseif ($mortexp >= 250 && $mortexp < 500) {
					$mortlevel = 2;
					$mortlevel2 = 500;
					$mortbeginlevel = 250;
				}
				elseif ($mortexp >= 500 && $mortexp < 1000) {
					$mortlevel = 3;
					$mortlevel2 = 1000;
					$mortbeginlevel = 500;
				}
				elseif ($mortexp >= 1000 && $mortexp < 1500) {
					$mortlevel = 4;
					$mortlevel2 = 1500;
					$mortbeginlevel = 1000;
				}
				elseif ($mortexp >= 1500 && $mortexp < 2000) {
					$mortlevel = 5;
					$mortlevel2 = 2000;
					$mortbeginlevel = 1500;
				}
				elseif ($mortexp >= 2000 && $mortexp < 2500) {
					$mortlevel = 6;
					$mortlevel2 = 2500;
					$mortbeginlevel = 2000;
				}
				elseif ($mortexp >= 2500 && $mortexp < 3500) {
					$mortlevel = 7;
					$mortlevel2 = 3500;
					$mortbeginlevel = 2500;
				}
				elseif ($mortexp >= 3500 && $mortexp < 4500) {
					$mortlevel = 8;
					$mortlevel2 = 4500;
					$mortbeginlevel = 3500;
				}
				elseif ($mortexp >= 4500 && $mortexp < 6000) {
					$mortlevel = 9;
					$mortlevel2 = 6000;
					$mortbeginlevel = 4500;
				}
				elseif ($mortexp >= 6000 && $mortexp < 7500) {
					$mortlevel = 10;
					$mortlevel2 = 7500;
					$mortbeginlevel = 6000;
				}
				elseif ($mortexp >= 7500 && $mortexp < 10000) {
					$mortlevel = 11;
					$mortlevel2 = 10000;
					$mortbeginlevel = 7500;
				}
				elseif ($mortexp >= 10000 && $mortexp < 12500) {
					$mortlevel = 12;
					$mortlevel2 = 12500;
					$mortbeginlevel = 10000;
				}
				elseif ($mortexp >= 12500 && $mortexp < 15000) {
					$mortlevel = 13;
					$mortlevel2 = 15000;
					$mortbeginlevel = 12500;
				}
				elseif ($mortexp >= 15000 && $mortexp < 20000) {
					$mortlevel = 14;
					$mortlevel2 = 20000;
					$mortbeginlevel = 15000;
				}
				elseif ($mortexp >= 20000 && $mortexp < 25000) {
					$mortlevel = 15;
					$mortlevel2 = 25000;
					$mortbeginlevel = 20000;
				}
				elseif ($mortexp >= 25000 && $mortexp < 30000) {
					$mortlevel = 16;
					$mortlevel2 = 30000;
					$mortbeginlevel = 25000;
				}
				elseif ($mortexp >= 30000 && $mortexp < 35000) {
					$mortlevel = 17;
					$mortlevel2 = 35000;
					$mortbeginlevel = 30000;
				}
				elseif ($mortexp >= 35000 && $mortexp < 40000) {
					$mortlevel = 18;
					$mortlevel2 = 40000;
					$mortbeginlevel = 35000;
				}
				elseif ($mortexp >= 40000 && $mortexp < 50000) {
					$mortlevel = 19;
					$mortlevel2 = 50000;
					$mortbeginlevel = 40000;
				}
				elseif ($mortexp >= 50000 && $mortexp < 60000) {

					$mortlevel = 20;
					$mortlevel2 = 60000;
					$mortbeginlevel = 50000;
				}
				elseif ($mortexp >= 50000 && $mortexp < 60000) {
				$mortlevel = 20;
				$mortlevel2 = 60000;
				$mortbeginlevel = 50000;
				}
				elseif ($mortexp >= 60000 && $mortexp < 75000) {
				$mortlevel = 21;
				$mortlevel2 = 75000;
				$mortbeginlevel = 60000;
				}
				elseif ($mortexp >= 75000 && $mortexp < 100000) {
				$mortlevel = 22;
				$mortlevel2 = 100000;
				$mortbeginlevel = 75000;
				}
				elseif ($mortexp >= 100000 && $mortexp < 150000) {
				$mortlevel = 23;
				$mortlevel2 = 150000;
				$mortbeginlevel = 100000;
				}
				elseif ($mortexp >= 150000 && $mortexp < 200000) {
				$mortlevel = 24;
				$mortlevel2 = 200000;
				$mortbeginlevel = 150000;
				}
				elseif ($mortexp >= 200000 && $mortexp < 300000) {
				$mortlevel = 25;
				$mortlevel2 = 300000;
				$mortbeginlevel = 200000;
				}
				elseif ($mortexp >= 300000 && $mortexp < 400000) {
				$mortlevel = 26;
				$mortlevel2 = 400000;
				$mortbeginlevel = 300000;
				}
				elseif ($mortexp >= 400000 && $mortexp < 500000) {
				$mortlevel = 27;
				$mortlevel2 = 500000;
				$mortbeginlevel = 400000;
				}
				elseif ($mortexp >= 500000 && $mortexp < 750000) {
				$mortlevel = 28;
				$mortlevel2 = 750000;
				$mortbeginlevel = 500000;
				}
				elseif ($mortexp >= 750000 && $mortexp < 1000000) {
				$mortlevel = 29;
				$mortlevel2 = 1000000;
				$mortbeginlevel = 750000;
				}
				elseif ($mortexp >= 1000000 && $mortexp < 1500000) {
				$mortlevel = 30;
				$mortlevel2 = 1500000;
				$mortbeginlevel = 1000000;
				}
				elseif ($mortexp >= 1500000 && $mortexp < 2000000) {
				$mortlevel = 31;
				$mortlevel2 = 2000000;
				$mortbeginlevel = 1500000;
				}
				elseif ($mortexp >= 2000000 && $mortexp < 2500000) {
				$mortlevel = 32;
				$mortlevel2 = 2500000;
				$mortbeginlevel = 2000000;
				}
				elseif ($mortexp >= 2500000 && $mortexp < 3000000) {
				$mortlevel = 33;
				$mortlevel2 = 3000000;
				$mortbeginlevel = 2500000;
				}
				elseif ($mortexp >= 3000000 && $mortexp < 3500000) {
				$mortlevel = 34;
				$mortlevel2 = 3500000;
				$mortbeginlevel = 3000000;
				}
				elseif ($mortexp >= 3500000 && $mortexp < 4000000) {
				$mortlevel = 35;
				$mortlevel2 = 4000000;
				$mortbeginlevel = 3500000;
				}
				elseif ($mortexp >= 4000000 && $mortexp < 4500000) {
				$mortlevel = 36;
				$mortlevel2 = 4500000;
				$mortbeginlevel = 4000000;
				}
				elseif ($mortexp >= 4500000 && $mortexp < 5000000) {
				$mortlevel = 37;
				$mortlevel2 = 5000000;
				$mortbeginlevel = 4500000;
				}
				elseif ($mortexp >= 5000000 && $mortexp < 7000000) {
				$mortlevel = 38;
				$mortlevel2 = 7000000;
				$mortbeginlevel = 5000000;
				}
				elseif ($mortexp >= 7000000 && $mortexp < 10000000) {
				$mortlevel = 39;
				$mortlevel2 = 10000000;
				$mortbeginlevel = 7000000;
				}
				elseif ($mortexp >= 10000000 && $mortexp < 20000000) {
				$mortlevel = 40;
				$mortlevel2 = 20000000;
				$mortbeginlevel = 10000000;
				}
				else {
					$mortlevel = 1;
				}
				$mortlevel3 = $mortlevel + 1;
				$level4 = $level2 - $exp;
				$mortlevel4 = $mortlevel2 - $mortexp;
				$morthoeveelnabegin = $mortexp - $mortbeginlevel;
				$morthoeveeltotaal = $mortlevel2 - $mortbeginlevel;
				$progressbar = 100 / $morthoeveeltotaal * $morthoeveelnabegin;
				$mortbeginlevel = $mortexp - $mortbeginlevel;
				
				echo "<div align=\"center\" style=\"position: absolute; left: 20%; right: 20%; bottom: 0; background-color: #ffee7d\"><strong>Current level:</strong> $mortlevel</div>"; ?></div>
                      <strong><p align="center" style="background-color:#F90; margin: 0; padding: 0">SKILLSET</p></strong><a href="">
                     <progress class="progress3" value="<?php echo $mortRow['attack']; ?>" max="50"></progress><strong>:Attack</strong><br>
                     <progress value="<?php echo $mortRow['defense']; ?>" max="50"></progress><strong>:Defense</strong><br>
                     <progress value="<?php echo $mortRow['working']; ?>" max="50"></progress><strong>:Working</strong><br>
                     <progress value="<?php echo $mortRow['tracking']; ?>" max="50"></progress><strong>:Tracking</strong><br>
                   	 <progress value="<?php echo $mortRow['diving']; ?>" max="50"></progress><strong>:Diving</strong><br> 
                     <progress value="<?php echo $mortRow['fishing']; ?>" max="50"></progress><strong>:Fishing</strong><br> 
                     <progress value="<?php echo $mortRow['hunting']; ?>" max="50"></progress><strong>:Hunting</strong><br>
                    <progress value="<?php echo $mortRow['digging']; ?>" max="50"></progress><strong>:Digging</strong><br></a>
                     <strong><p align="center" style="background-color:#F90; margin: 0; padding: 0">EVOLVE</p></strong>
					<?php
                    $mor2level = $mortRow['experience'];
			  if ($mor2level >= '100000') {
				  echo"no more evolutions";
			  }
			  elseif ($mor2level < '100000' && $mor2level >= '40000') {
				  $nextev = 100000 - $mortRow['experience'];
                 ?>

              <table width="100%" border="0" cellpadding="0" cellspacing="0">
              <tr>
              <td width="50%"><img src="characters/<?php echo $charRow['picture3']; ?>" width="100%"></td>
              <td width="50%">&nbsp;</td>
              </tr>
              <tr>
              <td width="50%" align="center" style="color:#000" bgcolor="#ffee7d"><strong><?php echo $charRow['name3']; ?></strong></td>
              <td width="50%" align="center">&nbsp;</td>
              </tr>
               <tr>
               <td align="center" colspan="2" style="color:#000"><?php echo "<strong>$nextev xp to evolve</strong>"; ?></td>
              </tr>
              </table>
              <?php
			  }
			  else {
				$nextev = 40000 - $mortRow['experience'];
              ?> <table width="100%" border="0" cellpadding="0" cellspacing="0">
              <tr>
              <td><img src="characters/<?php echo $charRow['picture2']; ?>" width="100%"></td>
              <td><img src="characters/<?php echo $charRow['picture3']; ?>" width="100%"></td>
              </tr>
              <tr>
              <td align="center" style="color:#000" bgcolor="#ffee7d"><strong><?php echo $charRow['name2']; ?></strong></td>
              <td align="center" style="color:#000" bgcolor="#ffee7d"><strong><?php echo $charRow['name3']; ?></strong></td>
              </tr>
               <tr>
               <td align="center" colspan="2" style="color:#000" bgcolor="#66FF00"><?php echo "<strong>$nextev xp to evolve</strong>"; ?></td>
              </tr>
              </table>
			  <?php
              }      ?>
			</div>
</td><td align="left" style="color:#000">
    <?php // HIER DE SCHATKIST ?>
             <div class="dropdowncenter">
			<button class="dropbtngold"><img src="images/safe.png" width="100%" style="max-height:80px; max-width:71px"></button>
			<div class="dropdown-content-center" align="left" style="z-index: 2">
                <p align="center" style="background-image: url(images/charbar.png); background-size:cover; margin: 0; padding: 0; width:250px; height:57px">
                    <strong>METALS</strong></p> 
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="33%" align="center"><img src="metals/gold.png" alt="gold button" title="gold" width="30"></td>
    <td width="33%" align="center"><img src="metals/silver.png" alt="silver button" title="silver" width="30"></td>
    <td align="center"><img src="metals/bronze.png" alt="bronze button" title="bronze" width="30"></td>
  </tr>
  <tr>
    <td align="center"><a href="home.php?page=aaa"><?php echo $userRow['gold']; ?></a></td>
    <td align="center"><a href=""><?php echo $userRow['silver']; ?></a></td>
    <td align="center"><a href=""><?php echo $userRow['bronze']; ?></a></td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="33%" align="center"><img src="metals/iron.png" alt="iron button" title="iron" width="30"></td>
    <td width="33%" align="center"><img src="metals/aluminum.png" alt="aluminum button" title="aluminum" width="30"></td>
        <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td align="center"><a href=""><?php echo $userRow['iron']; ?></a></td>
    <td align="center"><a href=""><?php echo $userRow['aluminum']; ?></a></td>
    <td align="center"><a href="">&nbsp;</a></td>
  </tr>
</table>
                <p align="center" style="background-image: url(images/charbar.png); background-size:cover; margin: 0; padding: 0; width:250px; height:57px">
                    <strong>ELEMENTS</strong></p> 
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="33%" align="center"><img src="elements/air.png" alt="air element" title="air"  width="30"></td>
    <td width="33%" align="center"><img src="elements/dragon.png" alt="dragon element" title="dragon"  width="30"></td>
    <td width="33%" align="center"><img src="elements/electric.png" alt="electric element" title="electric"  width="30"></td>
  </tr>
  <tr>
    <td align="center"><a href=""><?php echo $userRow['air']; ?></a></td>
    <td align="center"><a href=""><?php echo $userRow['dragon']; ?></a></td>
    <td align="center"><a href=""><?php echo $userRow['electric']; ?></a></td>
  </tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="33%" align="center"><img src="elements/fire.png" alt="fire element" title="fire"  width="30"></td>
    <td width="33%" align="center"><img src="elements/ghost.png" alt="ghost element" title="ghost"  width="30"></td>
    <td width="33%" align="center"><img src="elements/grass.png" alt="grass element" title="grass"  width="30"></td>
  </tr>
  <tr>
    <td align="center"><a href=""><?php echo $userRow['fire']; ?></a></td>
    <td align="center"><a href=""><?php echo $userRow['ghost']; ?></a></td>
    <td align="center"><a href=""><?php echo $userRow['grass']; ?></a></td>
  </tr>
</table>


<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="33%" align="center"><img src="elements/ground.png" alt="ground element" title="ground"  width="30"></td>
    <td width="33%" align="center"><img src="elements/ice.png" alt="ice element" title="ice"  width="30"></td>
    <td width="33%" align="center"><img src="elements/poison.png" alt="poison element" title="poison"  width="30"></td>
  </tr>
  <tr>
    <td align="center"><a href=""><?php echo $userRow['ground']; ?></a></td>
    <td align="center"><a href=""><?php echo $userRow['ice']; ?></a></td>
    <td align="center"><a href=""><?php echo $userRow['poison']; ?></a></td>
  </tr>
</table>


<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="33%" align="center"><img src="elements/psychic.png" alt="psychic element" title="psychic"  width="30"></td>
    <td width="33%" align="center"><img src="elements/rock.png" alt="rock element" title="ice"  width="30"></td>
    <td width="33%" align="center"><img src="elements/water.png" alt="water element" title="water"  width="30"></td>
  </tr>
  <tr>
    <td align="center"><a href=""><?php echo $userRow['psychic']; ?></a></td>
    <td align="center"><a href=""><?php echo $userRow['rock']; ?></a></td>
    <td align="center"><a href=""><?php echo $userRow['water']; ?></a></td>
  </tr>
</table>
            </div>
            </td><td align="left" style="color:#000">
    <?php // HIER DE SHOP ?>
             <div class="dropdownleft">
			<button class="dropbtngold"><img src="images/shop.png" width="100%" style="max-height:80px; max-width:71px"></button>
			<div class="dropdown-content-left" align="left" style="z-index: 2">
           <p align="center" style="background-image: url(images/charbar.png); background-size:cover; margin: 0; padding: 0; width:250px; height:57px">
                    <strong>STORES</strong></p> 
				<a href="profile.php"><img src="images/defense.png" width="16">
                Metal store</a>
                <a href="profile.php"><img src="images/attack.png" width="16">
                Element store</a>
                <a href="profile.php"><img src="images/shop.png" width="16">
                Black Market</a>
			</div>
</td>
<td align="left" style="color:#000">
    <?php // HIER DE HALL OF FAME ?>
             <div class="dropdownleft">
			<button class="dropbtngold"><img src="images/stage.png" width="100%" style="max-height:80px; max-width:71px"></button>
			<div class="dropdown-content-left" align="left" style="z-index: 2">
           <p align="center" style="background-image: url(images/charbar.png); background-size:cover; margin: 0; padding: 0; width:250px; height:57px">
                    <strong>HALL OF FAME</strong></p> 
				<a href="home.php?page=hof"><img src="images/defense.png" width="16"> Top 100</a>
                <a href="home.php?page=calc"><img src="images/defense.png" width="16"> Calc</a>
			</div>
</td>
</tr>
<tr><td colspan="6" bgcolor="#484848">
<div style="z-index: 1" class="skillbar clearfix" data-percent="<?php echo $progressbar; ?>%">
	<div class="skillbar-title" style="background: #88cd2a;"><span><?php echo"$mortlevel4 xp for level:<strong> $mortlevel3</strong>"; ?></span></div>
	<div class="skillbar-bar" style="background: #88cd2a;"></div>
	<div class="skill-bar-percent"><?php echo $progressbar; ?>%</div>
</div>

</td></tr></table>
             </div>
            
  <table bgcolor="#000000" width="100%" border="0" cellspacing="0" cellpadding="5">
  <tr height="100">
    <td colspan="3" style="color:#FFF" background="images/bgbanner.png" align="center">&nbsp;</td>
  </tr>
    <tr height="50">
    <td colspan="3" align="center">&nbsp;</td>
  </tr>
  </table>
   <table bgcolor="#000000" width="100%" border="0" cellspacing="0">
  <tr>
<?php
if ($_GET['page'] == 'HOF') { include('hof.php'); }
elseif ($_GET['page'] == 'admin') { include('admin.php'); }
elseif ($_GET['page'] == 'myprofile') { include('myprofile.php'); }
elseif ($_GET['page'] == 'updateplayer') { include('updateplayer.php'); }
elseif ($_GET['page'] == 'updateplayerprocess') { include('updateplayerprocess.php'); }
elseif ($_GET['page'] == 'updateaccount') { include('updateaccount.php'); }
elseif ($_GET['page'] == 'updateaccountprocess') { include('updateaccountprocess.php'); }
elseif ($_GET['page'] == 'addcharacter') { include('addcharacter.php'); }
elseif ($_GET['page'] == 'addbonus') { include('addbonus.php'); }
elseif ($_GET['page'] == 'bonus') { include('bonus.php'); }
elseif ($_GET['page'] == 'work') { include('work.php'); }
elseif ($_GET['page'] == 'dig') { include('dig.php'); }
elseif ($_GET['page'] == 'findbonus') { include('findbonus.php'); }
elseif ($_GET['page'] == 'tracking') { include('tracking.php'); }
elseif ($_GET['page'] == 'digging') { include('digging.php'); }
elseif ($_GET['page'] == 'test') { include('attack.php'); }
elseif ($_GET['page'] == 'battle') { include('definebattle.php'); }
elseif ($_GET['page'] == 'fight') { include('acceptbattle.php'); }
elseif ($_GET['page'] == 'reject') { include('rejectbattle.php'); }
elseif ($_GET['page'] == 'attack1') { include('attack1.php'); }
elseif ($_GET['page'] == 'calc') { include('calc.php'); }
else {
	include('hof.php');
}
?>
</td>
  </tr>
  </table>
</body>
</html>
<?php ob_end_flush(); ?>