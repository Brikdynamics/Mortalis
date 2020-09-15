<?php
 ob_start();
 session_start();
 require_once 'dbconnect.php';
 
 // if session is not set this will redirect to login page
 if( !isset($_SESSION['user']) ) {
  header("Location: index.php");
  exit;
 } 
 $sql = "UPDATE `battle`SET `lastattack`= `0` WHERE `playerID` = '".$_SESSION['user']."'";
   if(mysql_query($sql)){
     return "success!";
   }
   else {
    return "failed!";
  }
?></td>
  </tr>
</table>