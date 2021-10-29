
<?php
session_start();
include 'db_connect.php';
$conn=OpenCon();
//$id = $_GET['id'];
$p_id = $_GET['p_id'];



if($p_id!=null)
{
	
    $sql1="UPDATE parcel SET Action='Canceled' WHERE Product_id='$p_id'";
    //echo "dsffds";
  	
	   if($conn->query($sql1)===true)
	   {
	   	header("location:orders.php");
	   }else
	   echo "<script>
alert('There is a problem in system, correct it! Thank you 🙂');
window.location.href='orders.php';
</script>";
	}
	else
	   echo "<script>
alert('There is a problem in system, correct it! Thank you 🙂');
window.location.href='orders.php';
</script>";
?>