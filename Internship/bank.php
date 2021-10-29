<?php
session_start();

include 'db_connect.php';
$conn=OpenCon();
if(isset($_POST['submit'])){
$bank_name=$_POST['bank_name'];
$branch_name=$_POST['branch_name'];
$account_name=$_POST['account_name'];
$acc_type=$_POST['acc_type'];
$account_num=$_POST['account_num'];
$routing_num=$_POST['routing_num'];
$email=$_SESSION['email'];

if($email!=null)
{
	$sql1="UPDATE customer SET Payment_method='Bank', bank_name='$bank_name', acc_name='$account_name', acc_type='$acc_type', branch_name='$branch_name', acc_num='$account_num', routing_num='$routing_num', bk_num=NULL WHERE email='$email'";
	   if($conn->query($sql1)===true)
	   {
	   	if($parcel == true)
	   	{
	   		$sql2="UPDATE parcel SET Payment_method='Bank Name : $bank_name, Branch Name : $branch_name, Account Holder Name : $account_name, Account Type : $acc_type, Account Number : $account_num, Routing Number : $routing_num ' WHERE Product_id='$P_id'";
	   		if($conn->query($sql2)===true)
	   		{
	   			$parcel=false;
     		$_SESSION['parcel']=$parcel;
	   			header("location:orders.php");
	   		}
	   		

	   	}else
	   		header("location:my_payment.php");
	   		
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
