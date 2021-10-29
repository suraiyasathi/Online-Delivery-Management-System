<?php
session_start();

include 'db_connect.php';
$conn=OpenCon();
if(isset($_POST['submit']))
{	
$parcel=false;

$date=date("Y-m-d");	
$id = $_SESSION['id'];
$name=$_POST['name'];
$phone_num=$_POST['contact_number'];
$instructions=$_POST['instructions'];
$d_division=$_POST['division'];
$d_district=$_POST['district'];
$d_address=$_POST['d_address'];
$product_weight=$_POST['amount'];
$a=$product_weight/1000;
$amount=ceil($a);
if($d_division == 'Dhaka')
  {
  	$charge = $amount*60;
  	
  }
  else if($d_division == 'Barishal')
  {
  	$charge = $amount*160;
  	
  }
$cash=$_POST['payment_amount'];

$edit=$_SESSION['edit'];
$p_id=$_SESSION['p_id'];


if($id!=null)
{
	function unique_id()
	{
		$key=13;
		$str="1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ";
		$rand=substr(str_shuffle($str),0,$key);
		return $rand;
	}
	$P_id=unique_id();
	$_SESSION['P_id']=$P_id;

	$sql1="select * from my_location where ID='$id' and select_address='Selected'";
	 
	 $result1 = mysqli_query($conn,$sql1);
     if(mysqli_num_rows($result1)>0){
     while ($row1 = mysqli_fetch_assoc($result1)) {
     	$shop_name=$row1['Shop_name'];
     	$pickup_address=$row1['Pick_up_address'];
     	

     	$sql2="select * from customer where ID='$id'";
	 
	 $result2 = mysqli_query($conn,$sql2);
     if(mysqli_num_rows($result2)>0){
     while ($row2 = mysqli_fetch_assoc($result2)) {
     	$payment_method=$row2['Payment_method'];
     	$bk_num=$row2['bk_num'];
     	$bank_name=$row2['bank_name'];
     	$branch_name=$row2['branch_name'];
     	$acc_name=$row2['acc_name'];
     	$acc_type=$row2['acc_type'];
     	$acc_num=$row2['acc_num'];
     	$routing_num=$row2['routing_num'];
     	if($payment_method == 'Bkash')
     	{
        if($edit == true)
  {
    $edit=false;
     $_SESSION['edit']=$edit;
    $sql3="UPDATE parcel SET date='$date', phone_num='$phone_num', C_name='$name', Delivery_address='$d_address,$d_district,$d_division', product_weight='$product_weight', Cash_collection='$cash', delivery_charge='$charge', Instructions='$instructions' WHERE Product_id='$p_id'";
    //echo "dsffds";
  }
  else{
     		$sql3="insert into parcel(date,ID,Product_id,Shop_name,Phone_num,C_name,Pick_up_address,Delivery_address,product_weight,Cash_collection,delivery_charge,Payment_method,Instructions,status,Payment_status,Action)
	values('$date','$id','$P_id','$shop_name','$phone_num','$name','$pickup_address','$d_address,$d_district,$d_division','$product_weight','$cash','$charge','Bkash Number : $bk_num','$instructions','Not picked up yet','Not settled','--')";
  //echo "string";
}
     	}
     	else if($payment_method == 'Bank')
     	{
        if($edit == true)
  {
    $edit=false;
     $_SESSION['edit']=$edit;
    $sql3="UPDATE parcel SET date='$date', phone_num='$phone_num', C_name='$name', Delivery_address='$d_address, $d_district,$d_division', product_weight='$product_weight', Cash_collection='$cash', delivery_charge='$charge', Instructions='$instructions' WHERE Product_id='$p_id'";
    //echo "dsffds";
  }
  else{
     		$sql3="insert into parcel(date,ID,Product_id,Shop_name,Phone_num,C_name,Pick_up_address,Delivery_address,product_weight,Cash_collection,delivery_charge,Payment_method,Instructions,status,Payment_status,Action)
	values('$date','$id','$P_id','$shop_name','$phone_num','$name','$pickup_address','$d_address,$d_district,$d_division','$product_weight','$cash','$charge','Bank Name : $bank_name, Branch Name : $branch_name, Account Holder Name : $acc_name, Account Type : $acc_type, Account Number : $acc_num, Routing Number : $routing_num ','$instructions','Not picked up yet','Not settled','--')";
  //echo "string";
}
     	}
     	else{
     		$parcel=true;
     		$_SESSION['parcel']=$parcel;
     		$sql3="insert into parcel(date,ID,Product_id,Shop_name,Phone_num,C_name,Pick_up_address,Delivery_address,product_weight,Cash_collection,delivery_charge,Payment_method,Instructions,status,Payment_status,Action)
	values('$date','$id','$P_id','$shop_name','$phone_num','$name','$pickup_address','$d_address,$d_district,$d_division','$product_weight','$cash','$charge','--','$instructions','Not picked up yet','Not settled','--')";
     	}

	
	   if($conn->query($sql3)===true)
	   {
	   	if($parcel == true)
	   	{
	   		header("location:payment.php");
	   		
	   	}else{
	   		header("location:orders.php");
	   	}
	   }else {
  echo "<script>
alert('Please fill up this form correctly! Thank you 🙂');
window.location.href='parcel.php';
</script>";
}
}
}
}
}
}
}


?>   
 