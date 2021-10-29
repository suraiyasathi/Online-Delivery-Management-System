<?php
function OpenCon()
{
	$dbhost="localhost";  
	$dbuser="root";  
	$dbpass="";      
	$db="database";  
	$conn=new mysqli($dbhost,$dbuser,$dbpass,$db) or die("connect fail:%s\n".$conn->error);
	return $conn;
}

?>