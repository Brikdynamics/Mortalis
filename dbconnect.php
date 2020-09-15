<?php
 // this will avoid mysql_connect() deprecation error.
 error_reporting( ~E_DEPRECATED & ~E_NOTICE );
 // but I strongly suggest you to use PDO or MySQLi.
 
$dbhost = 'localhost';
$dbuser = 'user';
$dbpass = 'pass';
$dbname = 'game';
 
// Create connection
$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
 $dbcon = mysqli_select_db($dbname);
 
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "&nbsp;";
?>