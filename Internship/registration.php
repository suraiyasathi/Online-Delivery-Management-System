<?php
session_start();

include 'db_connect.php';
$conn=OpenCon();
if(isset($_POST['submit'])){
$name=$_POST['name'];
$email=$_POST['email'];
$pass=$_POST['pass'];
$conf_pass=$_POST['conf_pass'];



if($pass==$conf_pass && $pass!=null && $email!=null && $name!=null )
{
	function unique_id()
	{
		$key=13;
		$str="1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ";
		$rand=substr(str_shuffle($str),0,$key);
		return $rand;
	}
	$id=unique_id();
	
	$_SESSION['email']=$email;
	$_SESSION['id']=$id;
$sql1="insert into customer(Name,email,password,ID) 
       values('$name','$email','$pass','$id')";
	   
	   if($conn->query($sql1)===true)
	   {
	   	$option=false;
      $_SESSION['option']=$option;
      $address=false;
      $_SESSION['address']=$address;
	   	$first_time=true;
  $_SESSION['first_time']=$first_time;
	   		header("location:add_location.php");
	   }else{
echo "<script>
alert('Please fill up this form correctly! Thank you 🙂');
window.location.href='index.php';
</script>";
	
	
}
}
else{
echo "<script>
alert('Please fill up this form correctly! Thank you 🙂');
window.location.href='index.php';
</script>";
	
	
}
	
}



?>   
 