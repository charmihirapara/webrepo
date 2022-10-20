<?php 
echo "string";
var_dump(function_exists('mysqli_connect'));
error_reporting(E_ALL);
 $dbhost = "127.0.0.1";
 $dbuser = "root";
 $dbpass = "";
 $db = "mysql_practice";
 $conn = new mysqli_connect($dbhost, $dbuser, $dbpass) or die("Connect failed: %s\n". $conn -> error);
echo "string";

?>