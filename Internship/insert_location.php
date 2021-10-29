<?php
session_start();

include 'db_connect.php';
$conn=OpenCon();
if(isset($_POST['submit'])){
	
$shop_name=$_POST['shop_name'];
$pickup_address=$_POST['pickup_address'];

$contact_number=$_POST['contact_number'];

$id=$_SESSION['id'];

$email=$_SESSION['email'];
$option=$_SESSION['option'];
$address=$_SESSION['address'];

$first_time=$_SESSION['first_time'];


if($id!=null && $email!=null)
{
	if($option=='add' || $first_time==true)
	{
		$sql1="insert into my_location(ID,Shop_name,Pick_up_address,Phone_num,select_address) 
       values('$id','$shop_name','$pickup_address','$contact_number','Selected')";
       

   }else 
   {
   	$sql1="UPDATE my_location SET Shop_name='$shop_name', Pick_up_address='$pickup_address', Phone_num='$contact_number', select_address='Selected' WHERE ID='$id' and Pick_up_address='$address'";
   }

	   
	   if($conn->query($sql1)===true)
	   {
	   	$sql2="UPDATE my_location SET select_address=NULL WHERE Pick_up_address!='$pickup_address' and ID='$id'";

	   	if($conn->query($sql2)===true)
	   	{
	   	$sql3="select * from customer where email='$email' and ID='$id'";
	 
	 $result = mysqli_query($conn,$sql3);
     if(mysqli_num_rows($result)>0){
     while ($row = mysqli_fetch_assoc($result)) {
     	$P_method=$row['Payment_method'];
          
     	if($P_method != NULL)
     	{
     		header('location:my_location.php');
     	}else{
     		header('location:payment.php');
     	}		 
		 
	 }
	 }}
	   }}else{
echo "<script>
alert('Please fill up this form correctly! Thank you 🙂');
window.location.href='add_location.php';
</script>";
	
	
}
}


?>   
 