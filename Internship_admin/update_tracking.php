<?php
session_start();

include 'db_connect.php';
$conn=OpenCon();
if(isset($_POST['submit']))
{
  $date=date("M, d Y h:i A");
  

$p_id = $_SESSION['p_id'];
$step1=$_POST['step1'];
$step2=$_POST['step2'];
$step3=$_POST['step3'];



if($step1!=null)
{
	
    $sql1="UPDATE tracking SET picked_up='$date' WHERE Product_id='$p_id'";
    
  	
	   if($conn->query($sql1)===true)
	   {
      $sql2="UPDATE parcel SET status='Picked Up' WHERE Product_id='$p_id'";
      if($conn->query($sql2)===true)
      {      
	   			header("location:tracking.php");
        }
      
	   	}
      else{
	   		echo "<script>
alert('Please fill up this form correctly! Thank you 🙂');
window.location.href='tracking_info.php';
</script>";
	   	}
     }



     else if($step2!=null)
{
  
    $sql1="UPDATE tracking SET medium='$date' WHERE Product_id='$p_id'";
    echo "$p_id";
    
     if($conn->query($sql1)===true)
     {
      $sql2="UPDATE parcel SET status='On the way' WHERE Product_id='$p_id'";
      if($conn->query($sql2)===true)
      {      
          header("location:tracking.php");
        }
      
                
      }
      else{
        echo "<script>
alert('Please fill up this form correctly! Thank you 🙂');
window.location.href='tracking_info.php';
</script>";
      }
    }


    else if($step3!=null)
{
  
    $sql1="UPDATE tracking SET delivered='$date' WHERE Product_id='$p_id'";
    echo "$p_id";
    
     if($conn->query($sql1)===true)
     {
      $sql2="UPDATE parcel SET status='Delivered', Action='Complete' WHERE Product_id='$p_id'";
      if($conn->query($sql2)===true)
      {      
          header("location:tracking.php");
        }
      
      }
      else{
        echo "<script>
alert('Please fill up this form correctly! Thank you 🙂');
window.location.href='tracking_info.php';
</script>";
      }
    }
	   else {
  echo "<script>
alert('Please fill up this form correctly! Thank you 🙂');
window.location.href='tracking_info.php';
</script>";
}

}




?>   
 