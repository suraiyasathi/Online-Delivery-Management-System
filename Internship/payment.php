<!DOCTYPE html>
<html>
<head>
    <title>Payment System</title>
	<link rel="stylesheet" type="text/css" href="css/PaymentAccount.css">
	<link rel="stylesheet" type="text/css" href="css/all.css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700,800&display=swap" rel="stylesheet">
    <script>
    	function showBkash() {
    let select = document.getElementById('bkash')
    if (select.value == 'Bkash') {
    	document.getElementById('bank-pay').style.display = 'none'
        document.getElementById('bkash-pay').style.display = 'block'
    } else {
        document.getElementById('bkash-pay').style.display = 'none'
    }
}


function showBank() {
    let select = document.getElementById('bank')
    if (select.value == 'Bank') {
    	document.getElementById('bkash-pay').style.display = 'none'
        document.getElementById('bank-pay').style.display = 'block'
    } else {
        document.getElementById('bank-pay').style.display = 'none'
    }
}
</script>
</head>
<body>
	<div id="header">
    <div id="logo" style="margin-top: -2%;">
      <img src="images/logo.PNG">
    </div>
    <ul id="navbar" style="margin-top: -2%;">
    	<li> <a href="log_out.php">Log Out</a></li>
    <li> <a href= "my_location.php"> My Location </a> </li>
     <li> <a href= "orders.php"> Order History </a> </li>
     <li> <a href= "parcel.php"> Parcel </a> </li>
      <li> <a href="index.php"> Home</a></li>   
     
    </ul>
    <div class="search">
        <form>
            <input type="text" name="search" placeholder="Search.............." size="30">
          <button> Search</button>
      </form>
      </div>
  </div>
  
	<div class="row">
		<div class="column" style=" width: 100%; ">
			<div class="section"; style="height: 400%; width:40%;border-style: solid; margin-top: 100px; margin-left: 250px;">
		
			<h3> Payment Method </h3>

				<div class="select-box">
					<div class= "options-container active">
					<div class= "selected">
					<font color="blue";>Select Your Method </font> </div>
					
						<div class= "option">
					
							<input
							type= "radio"
							class= "radio"
							id="bank" onChange=showBank()
							name= "payment_option" value="Bank" required
							/>
							<label for= "bank"> Bank </label> 
							
						<br> 
						
							<input
							type= "radio"
							class= "radio"
							id="bkash" onChange=showBkash()
							name= "payment_option" value="Bkash" required
							/></li>
							<label for= "bkash">
							Bkash <br> <br> 							
							</label> 
							
						</div>
					
					</div>
				</div>
			</div>
		
				<br><br>
				
				<form id="bk" action="bk.php" method="post" >
					<div name="bkash-pay" id="bkash-pay" style="display: none;">
						<ol><li><h3> Bkash Number <font color= "red" size="5"> * </font> </h3> <br>
		
						
						<div class= "option">
							<input
							type= "box"
							class= "box"
							id="bk_number" placeholder="Enter Bkash Number"
							name= "bk_number" required
							/>	
						</div> </li></ol>
						
						<ol><li><h3> Confirm Bkash Number <font color= "red" size="5"> * </font></h3>  <br>
		
						<div class= "option">
						
							<input
							type= "box"
							class= "box"
							id="bk_conf_number" placeholder="Confirm Bkash Number"
							name= "bk_conf_number" required
							/>	
							
						</div>
						</li><br>
						<input type="submit" name="submit" value="Confirm">
						</ol>
					</div></form>
				
                    <form id="bank" action="bank.php" method="post" >
					<div name="bank-pay" id="bank-pay" style="display: none;">
				<ol> <li><h3> Bank Name <font color= "red" size="5"> * </font></h3>  <br> 
		
						<div class= "option">
							<input
							type= "box"
							class= "box"
							id="bank_name" placeholder="Bank Name"
							name= "bank_name" required
							/>	
						</div></li>
					<br>
					<li> <h3> Branch Name <font color= "red" size="5"> * </font></h3>  <br>
		
						<div class= "option">
							<input
							type= "box"
							class= "box"
							id="branch_name" placeholder="Branch Name"
							name= "branch_name" required
							/>	
						</div></li>
					<li> <h3> Account Name <font color= "red" size="5"> * </font></h3>  <br> 
		
						<div class= "option">
							<input
							type= "box"
							class= "box"
							id="account_name" placeholder="Account Holder Name"
							name= "account_name" required
							/>	
						</div></li>
				</ol>
				<br>
				
				<ol> <li>	Account Type: <font color= "red" size="5"> * </font> &nbsp;
		<select id="acc_type" name="acc_type" required>
		<option value="">Choose account type</option>
        <option value="Personal">Personal Account</option>
        <option value="Savings">Savings Account</option>
        <option value="Mutual">Mutual Account</option>
        </select></li><br><br>
        <li><h3> Account Number <font color= "red" size="5"> * </font></h3>  <br>
		
						<div class= "option">
							<input
							type= "box"
							class= "box"
							id="account_num" placeholder="Account Number"
							name= "account_num" required
							/>	
						</div></li><br>
						<li><h3> Routing Number</h3> <br>
		
						<div class= "option">
							<input
							type= "box"
							class= "box"
							id="routing_num" placeholder="Routing Number"
							name= "routing_num" 
							/>	
						</div></li>
						<br><br> <br>
						<input type="submit" name="submit" value="Confirm">
						</ol>
					</div></form>
		</div>
	</div>

</body>
</html>