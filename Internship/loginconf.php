<?php
session_start();
     include 'db_connect.php';
     $conn=OpenCon();
     $mail=$_POST['email'];
	 $pass=$_POST['pass'];
	 
	 $sql="select * from customer where email='$mail' and password='$pass'";
	 
	 $result = mysqli_query($conn,$sql);
     if(mysqli_num_rows($result)>0){
     while ($row = mysqli_fetch_assoc($result)) {
     	
          $_SESSION['email']=$row['email'];
          $id=$row['ID'];
          $_SESSION['id']=$id;
     	
          $sql1="select * from my_location where ID='$id'";
      
      $result1 = mysqli_query($conn,$sql1);
     if(mysqli_num_rows($result1)>0){
         header('location:parcel.php'); 
     }else
     {
      $option=false;
      $_SESSION['option']=$option;
      $address=false;
      $_SESSION['address']=$address;
          $first_time=true;
  $_SESSION['first_time']=$first_time;
     header('location:add_location.php');
}
	 }
	 }
	 else{
echo "<script>
alert('Invalid E-mail ID and Password! Please try again! Thank you 🙂');
window.location.href='index.php';
</script>";
}
?>