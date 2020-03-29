<?php

// this will avoid any error message
error_reporting(~E_DEPRECATED & ~E_NOTICE);



$hostName= "localhost";
$userName= "root";
$password= "";
$dbName= "cr11_florian_shelter";

$conn = mysqli_connect($hostName, $userName, $password, $dbName);

// check connection 
if(!$conn){
	echo "error";
}

// else{
// 	echo "works";
// }


?>