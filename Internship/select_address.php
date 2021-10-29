<?php
session_start();

include 'db_connect.php';
$conn=OpenCon();
$address = $_GET['address'];
$id=$_SESSION['id'];

if($address!=NULL)
{
	$sql1="UPDATE my_location SET select_address=NULL WHERE Pick_up_address!='$ddress' and ID='$id'";

	   	if($conn->query($sql1)===true)
	   	{
	   		$sql2="UPDATE my_location SET select_address='Selected' WHERE Pick_up_address='$address' and ID='$id'";
	   		if($conn->query($sql2)===true)
	   		{
	   			header('location:my_location.php');
	   			
	   		}
	   	}
}
?>