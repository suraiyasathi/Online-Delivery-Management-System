<!DOCTYPE html>
<html>
<head>
    <title>Add Location</title>
    
	
	<link rel="stylesheet" type="text/css" href="css/all.css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700,800&display=swap" rel="stylesheet">
	<style type="text/css">
		* {
  box-sizing: border-box;
}
		.column {
  float: left;
  width: 25%;
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

<body>
<div id="header">
    <div id="logo">
      <img src="images/logo.PNG">
    </div>
    <ul id="navbar">
    	<li> <a href="log_out.php">Log Out</a></li>
    <li> <a href= "my_payment.php"> Payment Info </a> </li>
    <li> <a href= "orders.php"> Parcels </a> </li>
    <li> <a href= "parcel.php"> Create Parcel </a> </li> 
     
    </ul>
    
  </div>
  <div class="row"> 
	<div class="column">
	<div class="section1" style="border-style: solid; width: 100%;">
		<section>
			<h2><font color= "#038cfc"; style= "margin-left: 90px;" > Add Your Shop </font> </h2> <br> <br>
			If you already add you shop then you can go to your shop.  <br><br>
			<font color= "red"; style= "margin-left: 10px" >You can also edit your shop details after create it. </font>
			<br><br>
			<section>
				<a href="medium.php?option=<?php echo "add"; ?>"> <font color= "green"; style= "border-style: dotted; margin-left: 75px; margin-top: 30px;" > Click here to add Your shop </font> </a>
			</section><br>
		</section>
	</div>
</div>

		<?php
session_start();

include 'db_connect.php';
$conn=OpenCon();
$id=$_SESSION['id'];
$sql1="select * from my_location where ID='$id'";
	 
	 $result = mysqli_query($conn,$sql1);
     if(mysqli_num_rows($result)>0){
     while ($row = mysqli_fetch_assoc($result)) {
     $shop_name=$row['Shop_name'];
     $pickup_address=$row['Pick_up_address'];
     $phone_num=$row['Phone_num'];
     $select_address=$row['select_address'];
     ?>

<div class="column">
		<div class="section2" style="border-style: solid; width: 100%;">
		<section>
			<h2><font color= "black"; style= "text-align: left; margin-left: 7%; font-size: 120%;" > <?php echo $shop_name; ?> </font> </h2> <br><p style= "margin-left: 7%;" ><?php echo $pickup_address; ?></p>
			<font color= "black"; style= "margin-left: 7%;" ><?php echo $phone_num; ?></font><br><br>
			<section>
				<?php 
				if($select_address==NULL)
				{
				?>
				<a href="select_address.php?address=<?php echo $pickup_address; ?>"> <font color= "green"; style= "border-style: dotted; margin-left: 15%;" > Select </font> </a>
				<?php
			}else
			{
				 ?>
				 <font color= "red"; style= "margin-left: 15%;" > Selected </font>
				 <?php 
				}
				?>
				<a href="medium.php?address=<?php echo $pickup_address; ?>& option=<?php echo "edit"; ?>"> <font color= "green"; style= "border-style: dotted; margin-left: 25%;" > Click here to edit </font> </a>
			</section><br>
		</section></div>
	</div>
		<?php
	}}
		 ?>
		
</div>
	
</body> 