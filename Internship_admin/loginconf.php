<?php
session_start();
     include 'db_connect.php';
     $conn=OpenCon();
     $mail=$_POST['email'];
	 $pass=$_POST['pass'];
	 
	 $sql="select * from admin where email='$mail' and password='$pass'";
	 
	 $result = mysqli_query($conn,$sql);
     if(mysqli_num_rows($result)>0){
     while ($row = mysqli_fetch_assoc($result)) {
     	
          $post=$row['post'];
          $Name=$row['Name'];
          $_SESSION['Name']=$Name;
          $_SESSION['email']=$row['email'];
          $id=$row['ID'];
          $_SESSION['id']=$id;

          if($post == 'admin')
          {
            header('location:orders.php');
          }else
     	
     		header('location:agent_orders.php');
     	
	 }
	 }
	 else{
echo "<script>
alert('Invalid E-mail ID and Password! Please try again! Thank you 🙂');
window.location.href='index.php';
</script>";
}
?>