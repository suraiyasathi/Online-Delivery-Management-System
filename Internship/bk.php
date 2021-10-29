<?php
session_start();

include 'db_connect.php';
$conn=OpenCon();
if(isset($_POST['submit'])){
$number=$_POST['bk_number'];
$conf_num=$_POST['bk_conf_number'];
$email=$_SESSION['email'];
$parcel=$_SESSION['parcel'];
$P_id=$_SESSION['P_id'];

if($number==$conf_num && $email!=null)
{
	$sql1="UPDATE customer SET Payment_method='Bkash', bk_num='$number', bank_name=NULL, acc_name=NULL, acc_type=NULL, branch_name=NULL, acc_num=NULL, routing_num=NULL WHERE email='$email'";
	   if($conn->query($sql1)===true)
	   {
	   	if($parcel == true)
	   	{
	   		$sql2="UPDATE parcel SET Payment_method='Bkash Number : $number' WHERE Product_id='$P_id'";
	   		if($conn->query($sql2)===true)
	   		{
	   			$parcel=false;
     		$_SESSION['parcel']=$parcel;
	   			header("location:orders.php");
	   		}
	   		//header("location:orders.php");

	   	}else
	   		header("location:my_payment.php");
	   		//echo "complete";
	   }
}
else{
echo "<script>
alert('Please fill up this form correctly! Thank you 🙂');
window.location.href='payment.php';
</script>";
	
	
}
}


?>   
 