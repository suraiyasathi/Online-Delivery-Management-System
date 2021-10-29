<?php
session_start();
include 'db_connect.php';
$conn=OpenCon();
$id = $_GET['id'];
$date=date("M, d Y h:i A");


if($id!=null)
{
	$sql1="UPDATE tracking SET payments='$date' WHERE Product_id='$p_id'";
    
  	
	   if($conn->query($sql1)===true)
	   {
	
    $sql2="UPDATE parcel SET Payment_status='Settled' WHERE ID='$id'";
    
  	
	   if($conn->query($sql2)===true)
	   {
	   	echo "<script>
alert('Settled Payment! Thank you 🙂');
window.location.href='payments.php';
</script>";
	   }else
	   echo "<script>
alert('There is a problem in system, correct it! Thank you 🙂');
window.location.href='payments.php';
</script>";
	}}
	else
	   echo "<script>
alert('There is a problem in system, correct it! Thank you 🙂');
window.location.href='payments.php';
</script>";
?>