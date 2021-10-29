<?php
session_start();
include 'db_connect.php';
$conn=OpenCon();
$mail=$_SESSION['email'];
$sql1="select Name,ID from customer where email='$mail'";
$result1 = mysqli_query($conn,$sql1);
     if(mysqli_num_rows($result1)>0){
     while ($row1 = mysqli_fetch_assoc($result1)) {
		 $name=$row1['Name'];
		 $id=$row1['ID'];
		 $_SESSION['id']=$id;
	 }
	 }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Parcel</title>
	<link rel="stylesheet" type="text/css" href="css/parcel_style.css">
	<link rel="stylesheet" type="text/css" href="css/all.css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700,800&display=swap" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	<script>
		//var c;
	$(document).ready(function(){
		$("#search").click( function(){
      document.getElementById('column').style.display = 'none'
      document.getElementById('cont').style.display = 'none'
      var p_id=$("#track").val();
      var submit=$("#search").val();
            $(".form-message").load("track_parcel.php",{
              p_id:p_id,    
        submit:submit
             
      });
});
		
		
		$('#division').on('change', function(){
        var Div = $(this).val();
        
        if(Div){
            $.ajax({
                type:'POST',
                url:'location.php',
                data:{div:Div},
                success:function(data){
                    $('#district').html(data);
                    
                }
            }); 
        }else{
            $('#district').html('<option value="">প্রথমে বিভাগ নির্বাচন করুন</option>');
            
        }
    });
		

});
	function p_amount() {
		
  var division = document.getElementById("division").value;
  var cash = document.getElementById("payment_amount").value;
  var x = document.getElementById("amount").value;
  var y = x/1000;
  var amount = Math.ceil(y);
  if(division == 'Dhaka')
  {
  	var charge = amount*60;
  	document.getElementById("pro").innerHTML = charge;
  }
  else if(division == 'Barishal')
  {
  	var charge = amount*160;
  	document.getElementById("pro").innerHTML = charge;
  }
  var t = (cash)-(charge);
  document.getElementById("total").innerHTML = t;
 
}
	function payment() {
  var x = document.getElementById("payment_amount").value;
  document.getElementById("pay").innerHTML = x;
  p_amount();
  c = charge;
  var t = cash-c;
  document.getElementById("total").innerHTML = t;
}





</script>	

</head>

<body> 
	<div id="header">
    <div id="logo">
      <img src="images/logo.PNG">
    </div>
    <ul id="navbar" style="border-style: none;">
    	<li> <a href="log_out.php">Log Out</a></li>
    	<li> <a href= "my_location.php"> My Location </a> </li>
    <li> <a href= "my_payment.php"> Payment Info </a> </li>
    <li> <a href="payments.php"> Payments</a></li>
     <li> <a href= "orders.php"> Parcels </a> </li>
             
     
    </ul>
    <div class="form" >
      <div class="search" >
        
            <input type="text" id="track"  name="track" placeholder="পার্সেল ID লিখুন" size="20">
          <input type="submit" id="search" name="search" value="Track Parcel">
      </div>

  </div><br><br><br><br><br><br>
  <p class="form-message"></p>
  </div>
	
	<?php

$sql2="select * from my_location where ID='$id' and select_address='Selected'";
	 
	 $result2 = mysqli_query($conn,$sql2);
     if(mysqli_num_rows($result2)>0){
     while ($row2 = mysqli_fetch_assoc($result2)) {
     $shop_name=$row2['Shop_name'];
     $pickup_address=$row2['Pick_up_address'];
     $phone_num=$row2['Phone_num'];
     $select_address=$row2['select_address'];
     ?>

<div class="column" id="column">
		<div class="section2" style="border-style: solid; width: 100%;">
		<section>
			<h2><font color= "black"; style= "text-align: left; margin-left: 5%; font-size: 100%;" > <?php echo "Shop Name : $shop_name"; ?> </font> </h2> <br><p style= "margin-left: 6%;" ><?php echo "Pick-up Address : $pickup_address"; ?></p>
			<font color= "black"; style= "margin-left: 6%;" ><?php echo "Contact Number : $phone_num"; ?></font><br><br>
			<br>
		</section></div>
	</div>
	<?php
	}}
		 ?>
		<div class="cont" id="cont">
			<h2 style="border-bottom: 4px solid blue; width: 20%; margin-top: 3%; ">নতুন পার্সেল তৈরি করুন</h2>
			<div class= "container" id="container" style="margin-top: 3%; margin-left: -5%;">
				<ol><li>
					<form id="insert" action="create_parcel.php" method="post" >
				<h3>Customer's Name <font color= "red" size="5"> * </font></h3> 
		
						<div class= "option">
							<input
							type= "box"
							class= "box"
							id="name" 
							name= "name" required
							/>
						
						</div>

					<br><br>
					
					
						
				<h3> Contact Number <font color= "red" size="5"> * </font></h3> 
		
						<div class= "option">
							<input
							type= "box"
							class= "box"
							id="contact_number" pattern="[0]{1}[1]{1}[0-9]{9}"
							name= "contact_number" required
							/>	
						</div>দয়া করে 01 দিয়ে শুরু করুন Ex: 01XXXXXXXXX.
					<br><br>


				<h3> Product Weight <font color= "red" size="5"> * </font></h3>
				
						<div class= "option">
							<input
							type= "box"
							class= "box"
							id="amount"
							name= "amount"
							oninput="p_amount()" required
							/>	
					</div>দয়া করে, আপনার মোট পণ্যের ওজনকে গ্রামে ইনপুট করুন !!
				<h3> <br><br>Delivery Location <font color= "red" size="5"> * </font></h3>
					
				<br>Division: &nbsp;
		<select id="division" name="division" oninput="p_amount()" required >
		<option value="">বিভাগ নির্বাচন করুন</option>
        <option value="Dhaka">Inside Dhaka</option>
        <option value="Barishal">Outside Dhaka</option>
        </select><br><br>
        District: &nbsp;&nbsp;&nbsp;
        <select id="district" name="district">
        <option value="">প্রথমে বিভাগ নির্বাচন করুন</option>
    </select>
    </li></ol>
			
			
				<ol><li>
				
				<h3> Delivery Address <font color= "red" size="5"> * </font></h3> 
		
						<div class= "option">
							<textarea 
							type= "box"
							class= "box"
							id="d_address"
							name= "d_address" rows="3" cols="35" required
							/></textarea>
					</div>Ex: 53/1, Road no. 06, Mannan line.	
					
				<h3><br> Cash Collection <font color= "red" size="5"> * </font></h3>

						<div class= "option">
							<input
							type= "box"
							class= "box"
							id="payment_amount"
							name= "payment_amount"
							oninput="payment()" required
							/>
						</div>
					দয়া করে, আপনার মোট পণ্যের দাম ইনপুট করুন টাকায় !!
					<br>

<div class="container1" style="margin-left: 30%;">
<h2 style="border-bottom: 4px solid blue; width: 95%;">ডেলিভারি চার্জের বিস্তারিত</h2>	<br>			
<h5 >Cash Collection    Tk. <span id="pay">0.00</span></p>
<br>
<h5> Delivery Charge    Tk. <span id="pro">0.00</span></p> <br>
					</br>
<hr >
<h5 >Total Payable Amount    Tk. <span id="total">0.00</span></p>
				</div>
				
				</li></ol>
				

				<ol><li>
											
				<h3> Instructions </h3> 
		
						<div class= "option">
							<textarea 
							type= "box"
							class= "box"
							id="instructions"
							name= "instructions" rows="7" cols="35"
							/></textarea>
											</div>
					<br>	
				<h3><br> Check Information </h3>
					
					<div class="select-box">
					
					<div class= "options-container active">		
						<div class= "options">
							<br><input
							type= "radio"
							class= "radio"
							id="submit"
							name= "submit" required
							/>
							<label for= "check"> আমি সমস্ত তথ্য সঠিকভাবে জমা দিচ্ছি </label>
						</div>
					</div>
					
					</div>
					
					

					<br><input type="submit" class="submit" name="submit" value="Submit">
				</li>
			</ol>
    </form>
		
</div>
</div>

				
						
		
</body>

</html>