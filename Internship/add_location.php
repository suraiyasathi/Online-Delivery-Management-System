<!DOCTYPE html>
<html>
<head>
    <title>Add Location</title>
    <link rel="stylesheet" type="text/css" href="css/addshop.css">
	
	<link rel="stylesheet" type="text/css" href="css/all.css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700,800&display=swap" rel="stylesheet">
	
	
	
</head>

<body>	
	<div id="header">
    <div id="logo">
      <img src="images/logo.PNG">
    </div>
    <ul id="navbar">
    	<li> <a href="log_out.php">Log Out</a></li>
     
     
    </ul>
    
  </div>
  <?php
session_start();

include 'db_connect.php';
$conn=OpenCon();
$id=$_SESSION['id'];
$address=$_SESSION['address'];
$option=$_SESSION['option'];
if($option=='edit')
{
$sql1="select * from my_location where ID='$id' and Pick_up_address='$address'";
	 
	 $result = mysqli_query($conn,$sql1);
     if(mysqli_num_rows($result)>0){
     while ($row = mysqli_fetch_assoc($result)) {
     $shop_name=$row['Shop_name'];
     $pickup_address=$row['Pick_up_address'];
     $phone_num=$row['Phone_num'];
     $select_address=$row['select_address'];
     ?>
  
			<div class= "container">
				<form id="insert" action="insert_location.php" method="post" >
				<ol><li><h3> Shop Name<font color= "red">* </font> </h3>
		
						<div class= "option">
							<input
							type= "box"
							class= "sname"
							id="shop_name" value="<?php echo $shop_name; ?>"
							name= "shop_name" required
							/>
						
						</div><br>
							
					
				<h3><br> Pickup Address<font color= "red">* </font> </h3>
		
						<div class= "option">
							<input
							type= "box"
							class= "box"
							id="pickup_address" value="<?php echo $pickup_address; ?>"
							name= "pickup_address" required
							/>
						</div>
					<br><br>	
					
				
				<h3> <br>Contact Number<font color= "red">* </font> </h3>
		
						<div class= "option">
							<input
							type= "box"
							class= "cnum" value="<?php echo $phone_num; ?>"
							id="contact_number" pattern="[0]{1}[1]{1}[0-9]{9}"
							name= "contact_number" required
							/>	
						</div>Please starts with 01. Ex: 01XXXXXXXXX.<br>	
				
				<h3><br>Check Information<font color= "red">* </font> </h3>
					
					<div class="select-box">
					<div class= "options-container active">		
						<div class= "options">
							<br><input
							type= "radio"
							class= "radio"
							id="submit"
							name= "submit" required
							/>
							<label for= "submit"> I submit all the information properly </label>
						</div>
					</div>
					<br><br>		
					</div><font color= "red"; > Check the all Information and go next!</font><br>

						<br><br><br><input type= "submit" class= "submit" id="Submit" value="Submit" />
						<br><br><br>
	
				</li></ol></form>
							
		</div>
	<?php
	}}}else{
		 ?>
		 <div class= "container">
				<form id="insert" action="insert_location.php" method="post" >
				<ol><li><h3> Shop Name<font color= "red">* </font> </h3>
		
						<div class= "option">
							<input
							type= "box"
							class= "sname"
							id="shop_name"
							name= "shop_name" required
							/>
						
						</div><br>
							
					
				<h3><br> Pickup Address<font color= "red">* </font> </h3>
		
						<div class= "option">
							<input
							type= "box"
							class= "box"
							id="pickup_address"
							name= "pickup_address" required
							/>
						</div>
					<br><br>	
					
				
				<h3> <br>Contact Number<font color= "red">* </font> </h3>
		
						<div class= "option">
							<input
							type= "box"
							class= "cnum"
							id="contact_number" pattern="[0]{1}[1]{1}[0-9]{9}"
							name= "contact_number" required
							/>	
						</div>Please starts with 01. Ex: 01XXXXXXXXX.<br>	
				
				<h3><br>Check Information<font color= "red">* </font> </h3>
					
					<div class="select-box">
					<div class= "options-container active">		
						<div class= "options">
							<br><input
							type= "radio"
							class= "radio"
							id="submit"
							name= "submit" required
							/>
							<label for= "submit"> I submit all the information properly </label>
						</div>
					</div>
					<br><br>		
					</div><font color= "red"; > Check the all Information and go next!</font><br>

						<br><br><br><input type= "submit" class= "submit" id="Submit" value="Submit" />
						<br><br><br>
	
				</li></ol></form>
							
		</div>
		<?php 
	}
	?>
</body>

</html>