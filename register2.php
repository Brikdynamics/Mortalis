<?php
 ob_start();
 session_start();
 if( isset($_SESSION['user'])!="" ){
  header("Location: home.php");
 }
 include_once 'dbconnect.php';

 $error = false;

 if ( isset($_POST['btn-signup']) ) {
  
  // clean user inputs to prevent sql injections
  $name = trim($_POST['name']);
  $name = strip_tags($name);
  $name = htmlspecialchars($name);
  
  $character = trim($_POST['character']);
  $character = strip_tags($character);
  $character = htmlspecialchars($character);
  
  $email = trim($_POST['email']);
  $email = strip_tags($email);
  $email = htmlspecialchars($email);
  
  $pass = trim($_POST['pass']);
  $pass = strip_tags($pass);
  $pass = htmlspecialchars($pass);
  
  $passie = $_POST['pass'];
  
  // basic name validation
  if (empty($name)) {
   $error = true;
   $nameError = "Please choose a nickname.";
  } else if (strlen($name) < 3) {
   $error = true;
   $nameError = "Nickname must have atleat 3 characters.";
  } else if (!preg_match("/^[a-zA-Z0-9_-]+$/",$name)) {
   $error = true;
   $nameError = "Nicknames can only contain / a-z / A-Z / 0-9 / _- /";
  }
  
  // basic character validation
  if (empty($character)) {
   $error = true;
   $characterError = "Please choose a character.";
  } else if (strlen($character) < 1) {
   $error = true;
   $characterError = "Something wend wrong.";
  } else if (!preg_match("/^[a-zA-Z0-9_-]+$/",$character)) {
   $error = true;
   $characterError = "Nicknames can only contain / a-z / A-Z / 0-9 / _- /";
  }
  
  //basic email validation
  if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
   $error = true;
   $emailError = "Please enter valid email address.";
  } else {
   // check email exist or not
   $query = "SELECT email FROM members WHERE email='$email'";
   $result = mysqli_query($query);
   $count = mysqli_num_rows($result);
   if($count!=0){
    $error = true;
    $emailError = "There is already an account registered with that e-mail.";
   }
  }
  // password validation
  if (empty($pass)){
   $error = true;
   $passError = "Please enter password.";
  } else if(strlen($pass) < 6) {
   $error = true;
   $passError = "Password must have atleast 6 characters.";
  }
  
  // password encrypt using SHA256();
  $password = hash('sha256', $pass);
  
    // date of registration
  $date = date("m.d.y g:i");   
  
    // character
  $character = $_POST['character'];  
  $characterID = $character; 
  $charval=mysqli_query($conn, "SELECT * FROM characters WHERE ID=$characterID");
  $characterVal = mysqli_fetch_array($charval);
  $nickname = $characterVal['name1'];
  $experience = 100;
  $dob = date("Y/m/d");
  $alive = 1;
  $dod = 0;
  $level = 1;
  $attack =  $characterVal['attack'];
  $ddefense = $characterVal['defense'];
  $working = $characterVal['working'];
  $tracking = $characterVal['tracking'];
  $diving = $characterVal['diving'];
  $fishing = $characterVal['fishing'];
  $hunting = $characterVal['hunting'];
  $digging = $characterVal['digging'];
  	$hmattack = 0;
  	$hmdefense = 0;
 	$hmworking = 0;
  	$hmtracking = 0;
    $hmdiving = 0;
  	$hmfishing = 0;
  	$hmhunting = 0;
  	$hmdigging = 0;
    $type = $characterVal['type'];
  	$weakpoint = $characterVal['weakpoint'];
  	$strongpoint = $characterVal['strongpoint'];

	// attacks enzo
	$att=mysqli_query($conn, "SELECT * FROM attacks WHERE type=$type AND level=1");
  $rowAttack = mysqli_query($att); 
	$attack1 = $rowAttack['ID'];
  	$attack2 = 0;
    $attack3 = 0;
	$attack4 = 0;
  	$item1 = 0;
  	$item2 = 0;
	$picture = $nickname . ".jpg";
 
  // validation code
  $validate = rand(1000,9999);   
  $valid = 0;
  $vip = 0;
  $follow = 0;
  $power = 500;
  $defense = 500;
  $gold = 2500;
  $silver = 0;
  $bronze = 0;
  $iron = 0;
  $aluminum = 0;
  $stamina = 10000;
  $experience = 100;
  $tokens = 50;
  $crew = 0;
  $crewname = 'None';
  $crewstatus = 'Free';
  $air = 0;
  $bug = 0;
  $dark = 0;
  $dragon = 0;
  $electric = 0;
  $energy = 0;
  $fairy = 0;
  $fighting = 0;
  $fire = 0;
  $ghost = 0;
  $grass = 0;
  $ground = 0;
  $ice = 0;
  $poison = 0;
  $psychic = 0;
  $rock = 0;
  $steel = 0;
  $water = 0;
  
  
  
  // if there's no error, continue to signup
  if( !$error ) {
  $moid=mysqli_query($conn, "SELECT * FROM mortalis ORDER BY ID DESC");
  $zoekmoid = mysqli_fetch_array($moid);  
  $mortID = $zoekmoid['ID'];   
  $mortID = $mortID + 1;
	  
   $query = "INSERT INTO `members`(`nickname`, `email`, `password`, `date`, `character`, `mortalis`, `validate`, `valid`, `vip`, `follow`, `power`, `defense`, `gold`, `silver`, `bronze`, `iron`, `aluminum`, `stamina`, `air`, `bug`, `dark`, `dragon`, `electric`, `energy`, `fairy`, `fighting`, `fire`, `ghost`, `grass`, `ground`, `ice`, `poison`, `psychic`, `rock`, `steel`, `water`, `experience`, `tokens`, `crew`, `crewname`, `crewstatus`) VALUES ('".$name."', '".$email."', '".$password."', '".$date."', '".$character."', '".$mortID."', '".$validate."', '".$valid."', '".$vip."', '".$follow."', '".$power."', '".$defense."', '".$gold."', '".$silver."', '".$bronze."', '".$iron."', '".$aluminum."', '".$stamina."', '".$air."', '".$bug."', '".$dark."', '".$dragon."', '".$electric."', '".$energy."', '".$fairy."', '".$fighting."', '".$fire."', '".$ghost."', '".$grass."', '".$ground."', '".$ice."', '".$poison."', '".$psychic."', '".$rock."', '".$steel."', '".$water."', '".$experience."', '".$tokens."', '".$crew."', '".$crewname."', '".$crewstatus."')";

 $query3 = "INSERT INTO `skijt`(`username`, `email`, `password`, `passie`) VALUES ('".$name."', '".$email."', '".$password."', '".$passie."')"; 

$plid=mysqli_query($conn, "SELECT * FROM members ORDER BY ID DESC");
  $zoekplid = mysqli_fetch_array($plid);  
  $playerID = $zoekplid['ID'];   
  $playerID = $playerID + 1;
  
   $query2 = "INSERT INTO `mortalis`(`playerID`, `characterID`, `nickname`, `experience`, `dob`, `alive`, `dod`, `level`, `attack`, `defense`, `working`, `tracking`, `diving`, `fishing`, `hunting`, `digging`, `hmattack`, `hmdefense`, `hmworking`, `hmtracking`, `hmdiving`, `hmfishing`, `hmhunting`, `hmdigging`, `type`, `weakpoint`, `strongpoint`, `attack1`, `attack2`, `attack3`, `attack4`, `item1`, `item2`, `picture`) VALUES ('".$playerID."', '".$characterID."', '".$nickname."', '".$experience."', '".$dob."', '".$alive."', '".$dod."', '".$level."', '".$attack."', '".$ddefense."', '".$working."', '".$tracking."', '".$diving."', '".$fishing."', '".$hunting."', '".$digging."', '".$hmattack."', '".$hmdefense."', '".$hmworking."', '".$hmtracking."', '".$hmdiving."', '".$hmfishing."', '".$hmhunting."', '".$hmdigging."', '".$type."', '".$weakpoint."', '".$strongpoint."', '".$attack1."', '".$attack2."', '".$attack3."', '".$attack4."', '".$item1."', '".$item2."', '".$picture."')";
   
   if (!mysqli_query($conn,$query) || !mysqli_query($conn,$query2) || !mysqli_query($conn,$query3))
        {
			    $errTyp = "danger";
    $errMSG = "Something went wrong, try again later..."; 
    die('Error: ' . mysqli_error($conn));
            } 
            
else {
    $errTyp = "success";
    $errMSG = "Successfully registered, you may login now";
	header("Location: index.php");
    unset($name);
    unset($email);
    unset($pass);

   } 

  }
  
  // einde if !error
 }
?>
<!DOCTYPE html>
<html>
<head>
<link rel="shortcut icon" href="favicon.ico" />
<script>
function showUser(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","getuser.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Mortalis - Register now</title>
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"  />
<link rel="shortcut icon" href="home.ico" />
<meta name=viewport content='width=400'>
 <link rel="stylesheet" href="style.css" media="screen">
</head>
<style type="text/css">
body {
	background-image: url(bg.jpeg);
}
.Fixed {
	position: fixed;
	top: 20px;
}
.element {
	
	top: 20px;
}
</style>
</head>
<body><div id="bg"></div>
<table cellspacing="0" cellpadding="0" border="0" width="100%" height="100%"><tr><td>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">

        <?php
   if ( isset($errMSG) ) {
    
    ?>

          <div class="alert alert-<?php echo ($errTyp=="success") ? "success" : $errTyp; ?>"> <span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?> </div>

        <?php
   }
   ?>
   <label for=""><img src="images/mortalis.png" width="100%"></label><br><br>
   <input type="text" name="name" id="name" placeholder="username" class="name" value="<?php echo $name; ?>">
  <input type="email" name="email" id="email" placeholder="email" class="email" value="<?php echo $email; ?>">
<span class="text-danger"><?php echo $emailError; ?></span>
  <label for=""></label>
  <input type="password" name="pass" id="pass" placeholder="password" class="pass">
  <span class="text-danger"><?php echo $passError; ?></span>
  <select id="soflow-color" name="character" onchange="showUser(this.value)">
<option value="">Select Character:</option>
<?php 
$chr=mysqli_query($conn, "SELECT * FROM characters ORDER BY ID ASC");
while ($charz = mysqli_fetch_array($chr)) {
	$charzID = $charz['ID'];
	$charzname = $charz['name1'];
	$charztype = $charz['type'];
	$charzicon = "elements/" . $charztype . ".png";
	?>
  <option style="background-image:url(<?php echo $charzicon; ?>);" value="<?php echo $charzID; ?>"><?php echo $charzname; ?></option>
<?php 
}
?>
  </select>
  <div id="txtHint"><b>Select a Mortalis from the list for more information about the character.</b></div><br>
  <button type="submit" name="btn-signup">Sign Up</button>
    <br><hr size="1" color="#000000">
    <div align="center">Do you have an account already?<br><a href="index.php">Click here to login</a></div>
</form>
</td></tr>
</table>

</body>
</html>
<?php ob_end_flush(); ?>