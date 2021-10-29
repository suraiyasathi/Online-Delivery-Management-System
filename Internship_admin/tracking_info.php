
<!DOCTYPE html>
<html>
<head>
    <title>Tracking Info</title>
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


.agent input[type="checkbox"]{
  
  top: 0;
  left: 0;
    height: 20px;
  width: 20px;
  background-color: #eee;
    margin-top: 1%;
    font-size: 16px;
    font-family: 'Nunito', sans-serif; 
  }

  .agent input[type="submit"]{
    width: 90%;
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
      <li> <a href="Tracking.php"> Track Parcel</a></li>
      <li> <a href="agent_orders.php"> Parcels</a></li>
      
      
      
      
      

    </ul>
    <div class="search">
        <form action="my_location.php" method = "POST">
            <input type="text"  name="searching" placeholder="Search.............." size="20">
          <input type="submit" id="search" name="search" value="Track Parcel">
      <p class="form-messages"></p>
    </form>
      </div>
  </div>
	
<div class="row">

<div class="column">
<div class="details">
<?php
  session_start();
include 'db_connect.php';
$conn=OpenCon();

$p_id=$_GET['p_id']; 
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
          
    ?>
  <div class="extra" style="border-style: solid; width: 70%;">
    <div class="agent" style= "text-align: left; margin-left: 7%;" >
    <form id="info" action="update_tracking.php" method="post" >
      
        <input type="checkbox" id="step3" name="step3" value="deliverd">পার্সেল ডেলিভারি সম্পন্ন হয়েছে<br><br>
        <input type="checkbox" id="step2" name="step2" value="medium">ডেলিভারি এজেন্ট <?php echo "$agent_name ($agent_phone)"; ?> ডেলিভারির জন্যে বের হয়েছে<br><br>
        <input type="checkbox" id="step1" name="step1" value="picked_up">পার্সেল পিকাপ সম্পন্ন হয়েছে<br>
        <input type="submit" id="submit" name="submit" value="Submit">
      </form>
    
    </div>
    
  </div>


<?php
}
}
?>

	
</body>
</html>