<?php
 ob_start();
 session_start();

 include_once 'dbconnect.php';

if ($_GET['jaikbenadmin'] == 'robert') {
		//DIT IS VOOR DE UPLOAD
$uploadsNeeded = $_POST['uploadsNeeded'];
for($i = 0; $i < $uploadsNeeded; $i++){
$file_name = $_FILES['uploadFile'. $i]['name'];
// strip file_name of slashes
$file_name = stripslashes($file_name);
$file_name = str_replace("'","",$file_name);
$_FILES['uploadedfile']['tmp_name'];
$copy = copy($_FILES['uploadFile'. $i]['tmp_name'],"characters/". $file_name);
 // prompt if successfully copied
 if($copy){
 echo "$file_name | uploaded sucessfully!<br>";
 }else{
 echo "$file_name | could not be uploaded!<br>";
 }
}

//DIT IS VOOR DE CHARACTER	
	$name1 = $_POST['name1'];
	$name2 = $_POST['name2'];
	$name3 = $_POST['name3'];
	$type = $_POST['type'];
	$strongpoint = $_POST['strongpoint'];
	$weakpoint = $_POST['weakpoint'];
	$information1 = $_POST['information1'];
	$information2 = $_POST['information2'];
	$information3 = $_POST['information3'];
	//skillpoints
	$attack = $_POST['attack'];
	$defense = $_POST['defense'];
	$working = $_POST['working'];
	$tracking = $_POST['tracking'];
	$diving = $_POST['diving'];
	$fishing = $_POST['fishing'];
	$hunting = $_POST['hunting'];
	$digging = $_POST['digging'];
	//de fotos van de 3 evoluties
	$picture1 = $_POST['name1'] . ".png";
	$picture2 = $_POST['name2'] . ".png";
	$picture3 = $_POST['name3'] . ".png";
	//DOEMAARDAN
	$query = "INSERT INTO `characters`(`name1`, `name2`, `name3`, `type`, `weakpoint`, `strongpoint`, `information1`, `information2`, `information3`, `attack`, `defense`, `working`, `tracking`, `diving`, `fishing`, `hunting`, `digging`, `picture1`, `picture2`, `picture3`) 
	VALUES ('".$name1."', '".$name2."', '".$name3."', '".$type."', '".$weakpoint."', '".$strongpoint."', '".$information1."', '".$information2."', '".$information3."', '".$attack."', '".$defense."', '".$working."', '".$tracking."', '".$diving."', '".$fishing."', '".$hunting."', '".$digging."', '".$picture1."', '".$picture2."', '".$picture3."')";

	if (!mysqli_query($conn,$query)) {
		$errTyp = "danger";
  	  	$errMSG = "Something went wrong, try again later..."; 
  	  	die('Error: ' . mysqli_error($conn));
    }
			
	echo"First form: $name1<br>Middle form2:$name2<br>Final form:$name3<br><br>";
	echo"Info about 1: $information1<br>Info about 2:$information2<br>Info about 3:$information3<br><br>";
	echo"What type:$type<br>";
	echo"SKILLPOINTS FROM STARTUP<br>Attack:$attack<br>Defense:$defense<br>Working:$working<br>Tracking:$tracking<br>Diving:$diving<br><br>Fishing:$fishing<br>Hunting:$hunting<br>Digging:$digging<br>";
	
	}
else {
	
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Coding Cage - Login & Registration System</title>
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"  />
<style type="text/css">
.Fixed
{
    position: fixed;
    top: 20px;
}
</style>
<script type="text/javascript">
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
window.sumInputs = function() {
    var inputs = document.getElementsByTagName('input'),
        result = document.getElementById('total'),
        sum = 0;            
    
    for(var i=0; i<inputs.length; i++) {
        var ip = inputs[i];
    
        if (ip.name && ip.name.indexOf("total") < 0) {
            sum += parseInt(ip.value) || 0;
        }
    
    }
    
    result.value = sum;
}
</script>
</head>
<body>
  <form enctype="multipart/form-data" name="image" method="post" action="addcharacter.php?jaikbenadmin=robert">
  <h1 align="center">Voeg Character toe</h1>
  <table border="0" cellpadding="5" cellspacing="5" align="center">
  <tr><td>
  <label for="name1">name 1:</label></td><td>
    <input name="name1" type="text"><br>
    </td></tr><tr><td>
    <label for="name2">name 2:</label></td><td>
    <input name="name2" type="text"><br>
    </td></tr><tr><td>
    <label for="name3">name 3:</label></td><td>
    <input name="name3" type="text"><br>
    </td></tr><tr><td>
    <label for="type">type:</label>
    </td><td>
<select name="type" id="type">
     <option value="air">air</option>
     <option value="bug">bug</option>
     <option value="dark">dark</option>
     <option value="dragon">dragon</option>
     <option value="electric">electric</option>
     <option value="energy">energy</option>
     <option value="fairy">fairy</option>
     <option value="fighting">fighting</option>
     <option value="fire">fire</option>
     <option value="ghost">ghost</option>
     <option value="grass">grass</option>
     <option value="ground">ground</option>
     <option value="ice">ice</option>
     <option value="poison">poison</option>
     <option value="psychic">psychic</option>
     <option value="rock">rock</option>
     <option value="steel">steel</option>
     <option value="water">water</option>
    </select><br>
    </td></tr><tr><td>
    <label for="type">weakpoint:</label>
    </td><td>
<select name="weakpoint" id="weakpoint">
     <option value="air">air</option>
     <option value="bug">bug</option>
     <option value="dark">dark</option>
     <option value="dragon">dragon</option>
     <option value="electric">electric</option>
     <option value="energy">energy</option>
     <option value="fairy">fairy</option>
     <option value="fighting">fighting</option>
     <option value="fire">fire</option>
     <option value="ghost">ghost</option>
     <option value="grass">grass</option>
     <option value="ground">ground</option>
     <option value="ice">ice</option>
     <option value="poison">poison</option>
     <option value="psychic">psychic</option>
     <option value="rock">rock</option>
     <option value="steel">steel</option>
     <option value="water">water</option>
    </select><br>
    </td></tr><tr><td>
    <label for="type">strongpoint:</label>
    </td><td>
<select name="strongpoint" id="strongpoint">
     <option value="air">air</option>
     <option value="bug">bug</option>
     <option value="dark">dark</option>
     <option value="dragon">dragon</option>
     <option value="electric">electric</option>
     <option value="energy">energy</option>
     <option value="fairy">fairy</option>
     <option value="fighting">fighting</option>
     <option value="fire">fire</option>
     <option value="ghost">ghost</option>
     <option value="grass">grass</option>
     <option value="ground">ground</option>
     <option value="ice">ice</option>
     <option value="poison">poison</option>
     <option value="psychic">psychic</option>
     <option value="rock">rock</option>
     <option value="steel">steel</option>
     <option value="water">water</option>
    </select><br>
    </td></tr><tr><td>
    <label for="information1">information 1:</label>
    </td><td>
    <textarea name="information1" cols="40" rows="4"></textarea><br>
        </td></tr><tr><td>
    <label for="information2">information 2:</label>
    </td><td>
    <textarea name="information2" cols="40" rows="4"></textarea><br>
        </td></tr>
        <tr><td>
    <label for="information3">information 3:</label>
    </td><td>
    <textarea name="information3" cols="40" rows="4"></textarea><br>
        </td></tr><tr>
          <td colspan="2">
    50 skillpoints total to use
    </td></tr><tr><td>
    <label for="attack">attack:</label>
    </td><td>
    <input name="attack" type="text"><br>
        </td></tr><tr><td>
    <label for="defense">defense:</label>
    </td><td>
    <input name="defense" type="text"><br>
        </td></tr><tr><td>
    <label for="working">working:</label>
    </td><td>
    <input name="working" type="text"><br>
        </td></tr><tr><td>
    <label for="tracking">tracking:</label>
    </td><td>
    <input name="tracking" type="text"><br>
        </td></tr><tr><td>
    <label for="diving">diving:</label>
    </td><td>
    <input name="diving" type="text"><br>
        </td></tr><tr><td>
    <label for="fishing">fishing:</label>
    </td><td>
    <input name="fishing" type="text"><br>
    </td></tr><tr><td>
    <label for="hunting">hunting:</label>
    </td><td>
    <input name="hunting" type="text"><br>
    </td></tr><tr><td>
    <label for="digging">digging:</label>
    </td><td>
    <input name="digging" type="text"><br>
    </td></tr><tr>
      <td>&nbsp;</td><td>
      
    <input type="text" name="total" id="total"><a href="javascript:sumInputs()">Calculate</a><br>
    </td></tr>
  <?
  $uploadsNeeded = '3';
  for($i=0; $i < $uploadsNeeded; $i++){
  ?>
  <tr><td>
  <label for="uploadFile<? echo $i;?>">image <? echo $i + 1;?>:</label>
    </td><td>
    <input name="uploadFile<? echo $i;?>" type="file" id="uploadFile<? echo $i;?>" />
</td></tr>
  <? } ?>
<input name="uploadsNeeded" type="hidden" value="<? echo $uploadsNeeded;?>" />

<tr><td>
        
    </td><td>
    <input type="submit" name="Submit" value="Add Character"/><br>
        </td></tr></table>
</form>

</body>
</html>
<?php 
}
ob_end_flush(); ?>