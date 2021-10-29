
<!DOCTYPE html>
<html>
<head>
    <title>Agent Info</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/a.css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700,800&display=swap" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	

	<style>
	
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
  color: black;
}

td, th {
  text-align: center;
  padding:18px;
}
#t01 th {
  background-color: #4da6ff;
  color: black;
}
th {text-align: center;}
tr:nth-child(even) {
  background-color: #dddddd;
}
tr:nth-child(odd) {
  background-color: #e0ebeb;
}


.agent input{
    display: block;
    width: 90%;
    margin-top: 1%;
    font-size: 16px;
    font-family: 'Nunito', sans-serif; 
  }

  .agent input[type="submit"]{
    margin-top: 40px;
    margin-bottom: 30px;
    text-transform: uppercase;
    font-weight: 600px;
    font-family: 'Nunito', sans-serif;
    background: -webkit-linear-gradient(left, #24dbef,  #0c116f );
  }
  
  .agent input[type="submit"]:hover{
    background: -webkit-linear-gradient(left, #0c116f, #24dbef);
    );
  }



  * {
  box-sizing: border-box;
}
    .column {
  float: left;
  width: 50%;
  padding: 0 10px;
  margin-top:30px;
  right: calc(50% - 50px);
  
}


.row {margin: 0 15px;}

.row:after {
  content: "";
  display: table;
  clear: both;
}


@media screen and (max-width: 600px) {
  .column {
    width: 100%;
    display: block;
    margin-bottom: 20px;
  }
}
}
	
</style>


</head>
<body><div id="header">
    <div id="logo">
      <img src="images/logo.PNG">
    </div>
    <ul id="navbar">
      <li> <a href="log_out.php">Log Out</a></li>
      <li> <a href="payments.php"> Payments</a></li>
      <li> <a href="admin_tracking.php"> Track Parcel</a></li>
      <li> <a href="orders.php"> Parcels</a></li>
      
      
      
      
      

    </ul>
    
  </div>
	
<div class="row">

<div class="column">
<div class="details">
<?php
  session_start();
include 'db_connect.php';
$conn=OpenCon();
//$serial=1;
$p_id = $_SESSION['p_id'];
$_SESSION['p_id']=$p_id; 
  
$sql1 = "select * from parcel where Product_id='$p_id'";
$result1 = mysqli_query($conn,$sql1);
     if(mysqli_num_rows($result1)>0){
     while ($row1= mysqli_fetch_assoc($result1)) {
     
     $id=$row1['ID'];
     $pickup_address=$row1['Pick_up_address'];
     $shop=$row1['Shop_name'];
     $c_phone_num=$row1['Phone_num'];
     $c_name=$row1['C_name'];
     $delivery_address=$row1['Delivery_address'];
     

     $sql2 = "select * from my_location where ID='$id' and Pick_up_address='$pickup_address'";
$result2 = mysqli_query($conn,$sql2);
     if(mysqli_num_rows($result2)>0){
     while ($row1= mysqli_fetch_assoc($result2)) {
      $m_phone_num=$row1['Phone_num'];
      ?>
      <h2>Product ID : <?php echo "$p_id"; ?></h2><br>
      <h2>Merchant's Info</h2>
      <span style="font-size:130%;">Shop Name : <?php echo "$shop"; ?></span><br>
      <span style="font-size:130%;">Pick-up Address : <?php echo "$pickup_address"; ?></span><br>
      <span style="font-size:130%;">Contact Number : <?php echo "$m_phone_num"; ?></span><br><br>

      <h2>Customer's Info</h2>
      <span style="font-size:130%;">Customer's Name : <?php echo "$c_name"; ?></span><br>
      <span style="font-size:130%;">Delivery Address : <?php echo "$delivery_address"; ?></span><br>
      <span style="font-size:130%;">Contact Number : <?php echo "$c_phone_num"; ?></span><br><br>
      <?php
    }}}}
    ?>

  </div>
</div>


<div class="column">
  <?php
    $sql3="select * from parcel where Product_id='$p_id'";
   
   $result3 = mysqli_query($conn,$sql3);
     if(mysqli_num_rows($result3)>0){
     while ($row3 = mysqli_fetch_assoc($result3)) {
      $agent_name=$row3['agent_name'];
      $agent_phone=$row3['agent_phone'];
      
      

  if($agent_name!=null && $agent_phone!=null)    
  {
      $input_extra=true;
    $_SESSION['input_extra']=$input_extra;  
    ?>
  <div class="extra" style="border-style: solid; width: 50%;">
    <div class="agent" style= "text-align: left; margin-left: 7%;" >
    <form id="info" action="update.php" method="post" >
        <h2>Delivery Agent's Name:</h2>
        <input type="text" id="extra_name" name="extra_name" value="<?php echo $agent_name; ?>" placeholder="Agent's Name" size="30" required><br>
        <h2>Contact Number:</h2>
        <input type="text" id="extra_phone" name="extra_phone" value="<?php echo $agent_phone; ?>" placeholder="Phone Number" size="30" pattern="[0]{1}[1]{1}[0-9]{9}" required>
        <input type="submit" id="submit" name="submit" value="Submit">
      </form>
    
    </div>
    
  </div>

  <?php
}
else
{
  $input_extra=false;
    $_SESSION['input_extra']=$input_extra;
  ?>

	<div class="show" style="border-style: solid; width: 50%;">

	<div class="agent" style= "text-align: left; margin-left: 7%;" >
    <form id="info" action="update.php" method="post" >
        <h2>Delivery Agent's Name:</h2>
        <input type="text" id="name" name="name" placeholder="Agent's Name" size="30" required><br>
        <h2>Contact Number:</h2>
        <input type="text" id="phone_num" name="phone_num" placeholder="Phone Number" size="30" pattern="[0]{1}[1]{1}[0-9]{9}" required>
        <input type="submit" id="submit" name="submit" value="Submit">
      </form>
    
    </div>
</div>
</div>

</div>
<?php
}
}}
?>

	
</body>
</html>