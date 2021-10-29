<?php
session_start();

include 'db_connect.php';
$conn=OpenCon();
if(isset($_POST['submit']))
{


$input_extra = $_SESSION['input_extra'];

$p_id = $_SESSION['p_id'];
if($input_extra==true)
{
  $name=$_POST['extra_name'];
  $phone=$_POST['extra_phone'];
}
else
{
  $name=$_POST['name'];
  $phone=$_POST['phone_num'];
}


$_SESSION['p_id']=$p_id;


if($p_id!=null && $name!=null && $phone!=null)
{
	
    $sql1="UPDATE parcel SET agent_name='$name', agent_phone='$phone' WHERE Product_id='$p_id'";
    
	   if($conn->query($sql1)===true)
	   {
      $sql2="insert into tracking(Product_id) values('$p_id')";
      if($conn->query($sql2)===true)
      {
	   			echo "<script>
alert('Data insertion successful! Thank you 🙂');
window.location.href='extra_agent_info.php';
</script>";
      }else
      echo "<script>
alert('Data insertion successful! Thank you 🙂');
window.location.href='extra_agent_info.php';
</script>";
	   		
	   	}
      else{
	   		echo "<script>
alert('Please fill up this form correctly! Thank you 🙂');
window.location.href='extra_agent_info.php';
</script>";
	   	}
     }
	   else {
  echo "<script>
alert('Please fill up this form correctly! Thank you 🙂');
window.location.href='extra_agent_info.php';
</script>";
}

}




?>   
 