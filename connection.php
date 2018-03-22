<?php 
 $dbservername= "localhost";
 $dbusername= "root";
 $dbpassword= "root";
 $dbname="insertdata";

 $conn= mysqli_connect($dbservername,$dbusername,$dbpassword,$dbname);

 if(! $conn){
 	die('Could not connect:'.mysql_error());
 }

 
 
?>