<?php
 ob_start();
 session_start();
  require_once 'dbconnect.php';
 
 // it will never let you open index(login) page if session is set
 if ( isset($_SESSION['user'])!="" ) {
  header("Location: home.php");
  exit;
 }
 
 $error = false;
 
 if( isset($_POST['btn-login']) ) { 
  
  // prevent sql injections/ clear user invalid inputs
  $email = trim($_POST['email']);
  $email = strip_tags($email);
  $email = htmlspecialchars($email);
  
  $pass = trim($_POST['pass']);
  $pass = strip_tags($pass);
  $pass = htmlspecialchars($pass);
  // prevent sql injections / clear user invalid inputs
  
  if(empty($email)){
   $error = true;
   $emailError = "Please enter your email address.";
  } else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
   $error = true;
   $emailError = "Please enter valid email address.";
  }
  
  if(empty($pass)){
   $error = true;
   $passError = "Please enter your password.";
  }
  
  // if there's no error, continue to login
  if (!$error) {
   
   $password = hash('sha256', $pass); // password hashing using SHA256
  
   $res=mysqli_query($conn, "SELECT ID, nickname, password FROM members WHERE email='$email'");
   $row=mysqli_fetch_array($res);
   $count = mysqli_num_rows($res); // if uname/pass correct it returns must be 1 row
   
   if( $count == 1 && $row['password']==$password ) {
    $_SESSION['user'] = $row['ID'];
    header("Location: home.php");
   } else {
    $errMSG = "Incorrect Credentials, Try again...";
   }
    
  }
  
 }
 
?>
<!DOCTYPE html>
<html lang="en">

<head>
<link rel="shortcut icon" href="favicon.ico" />
<meta name=viewport content='width=400'>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Mortalis</title>
 <link rel="stylesheet" href="style.css" media="screen">
</head>
<body><div id="bg"></div>
<table cellspacing="0" cellpadding="0" border="0" width="100%" height="100%"><tr><td>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
    
              <?php
   if ( isset($errMSG) ) {
    
    ?>
            
 <?php echo $errMSG; ?>
            <?php
   }
   ?>
   <label for=""><img src="images/mortalis.png" width="100%"></label><br><br>
  <input type="email" name="email" id="email" placeholder="email" class="email" value="<?php echo $email; ?>">
<span class="text-danger"><?php echo $emailError; ?></span>
  <label for=""></label>
  <input type="password" name="pass" id="pass" placeholder="password" class="pass">
  <span class="text-danger"><?php echo $passError; ?></span>
    
  <button type="submit" name="btn-login">inloggen</button>
    <br><hr size="1" color="#000000">
    <div align="center">Not playing yet?<br><a href="register2.php">Start playing for free within seconds!</a></div>
</form>
</td></tr>
</table>
</body>
</html>
<?php ob_end_flush(); ?>