<!DOCTYPE html>
<html>
<head>
	<title>Unishopr product to purchase</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/my_payment.css">
  <link rel="stylesheet" type="text/css" href="css/all.css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700,800&display=swap" rel="stylesheet">
</head>
<body>
    

  <div id="header" style="margin-bottom: 665px;">
    <div id="logo">
      <img src="images/logo.PNG">
    </div>
    <ul id="navbar">
    <li> <a href="log_out.php">Log Out</a></li>
    <li> <a href="my_location.php"> My Location</a></li>
    <li> <a href= "orders.php"> Parcels </a> </li>
    <li> <a href= "parcel.php"> Create Parcel </a> </li>
     
     
          
  

    </ul>
    
      
  </div>
  
  <div class="track">
    <h1> Manage Your Payemnt Method</h1><br>
    <h2 style="color:blue">  <a href="payment.php">Change Payment Method </a></h2><br>
    <?php
session_start();
include 'db_connect.php';
$conn=OpenCon();
$mail=$_SESSION['email'];
$sql="select * from customer where email='$mail'";
$result = mysqli_query($conn,$sql);
     if(mysqli_num_rows($result)>0){
     while ($row = mysqli_fetch_assoc($result)) {
     $P_method=$row['Payment_method'];
     $bk_num=$row['bk_num'];
     $bank_name=$row['bank_name'];
     $branch_name=$row['branch_name'];
     $acc_name=$row['acc_name'];
     $acc_type=$row['acc_type'];
     $acc_num=$row['acc_num'];
     $routing_num=$row['routing_num'];
     
           ?>
      <p> Your default to receive payment is through <?php echo $P_method; ?></p>
    
  </div>
  <div class="container">
    <?php
    if($P_method == 'Bkash')
     {
      ?>
      <h2> Bkash Number &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;<?php echo $bk_num; ?></h2><br>
      
      <?php
     }else if($P_method == 'Bank')
     {
      ?>
      <h2> Bank Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;<?php echo $bank_name; ?></h2>
      <h2> Accout Holder Name &nbsp;: &nbsp;&nbsp;<?php echo $acc_name; ?></h2>
      <h2> Branch Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;<?php echo $branch_name; ?></h2>
      <h2> Account Type &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;<?php echo $acc_type; ?></h2>
      <h2> Account Number &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;<?php echo $acc_num; ?></h2>
      <h2> Routing Number &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;<?php echo $routing_num; ?></h2>
      
      <?php
     }
   }
   }
?>
      
  </div>
 
   
  
  
</body>
</html>
