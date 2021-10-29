
<!DOCTYPE html>
<html>
<head>
    <title>Payments</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/a.css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700,800&display=swap" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	

	<style>
	
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 90%;
  color: black;
}

td, th {
  text-align: center;
  padding:18px;
}
#t01 th {
  background-color: #4da6ff;
  color: black;
  text-align: center;
}
#t02 th {
  background-color: white;
  color: black;
  text-align: left;
}
/*th {text-align: center;}*/
tr:nth-child(even) {
  background-color: #dddddd;
}
tr:nth-child(odd) {
  background-color: #e0ebeb;
}
	
</style>

</head>
<body><div id="header">
    <div id="logo">
      <img src="images/logo.PNG">
    </div>
    <ul id="navbar">
      <li> <a href="log_out.php">Log Out</a></li>
    <li> <a href= "my_payment.php"> Payment Info </a> </li>
    <li> <a href= "my_location.php"> My Location </a> </li>
     <li> <a href="orders.php"> Parcels</a></li>
     <li> <a href="parcel.php"> Create Parcel</a></li>      
      
      
      
      

    </ul>
    
  </div>
	
	
	<div class="tablestyle" id="parcels" style="margin-top: 5%; display: block;">
	
    <table id="t01" align="center" style="text-align: center">
	<thead>
	<tr>
		<th>Product ID</th>		
		<th>Cash Collection(Tk.)</th>
		<th>Delivery Charge(Tk.)</th>
		<th>Payable Amount(Tk.)</th>
		<th>Amount Paid Out(Tk.)</th>
		
		
	</tr>
	</thead>
	<tbody>
	<?php
	session_start();
include 'db_connect.php';
$conn=OpenCon();
$total_cash=0;
$total_charge=0;
$total_payable=0;

$date = $_GET['date'];
?>
<h2 style="margin-left: 5%;">Payments Details</h2>
<h2 style="margin-left: 5%; border-bottom: 4px solid blue; width: 13%; margin-top: -1%;"><?php echo "Date : $date"; ?></h2>	
<?php
$id=$_SESSION['id'];
$sql1 = "SELECT * FROM parcel where ID='$id' and date='$date' and Action!='Canceled';";
$result1 = mysqli_query($conn,$sql1);
     if(mysqli_num_rows($result1)>0){
     while ($row1= mysqli_fetch_assoc($result1)) {
     $P_id=$row1['Product_id'];
     $cash=$row1['Cash_collection'];
     $charge=$row1['delivery_charge'];
     $status=$row1['Payment_status'];
     $payable=$cash-$charge;
if($status!='Settled')
     {

     $total_cash=$total_cash+$cash;
     $total_charge=$total_charge+$charge;
     $total_payable=$total_payable+$payable;
   }   
     
     	 
		 echo "<tr><td>".$P_id."</td><td>".$cash."</td><td>".$charge."</td><td>".$payable."</td><td>".$status."</td></tr>";	 

		 }
		 }?>
</tbody>

	 </table>
</div>
<table id="t02" align="center" style="margin-left: 14%; width: 60%;">
  <thead>
<?php 
echo "<tr><th>"."</th><th>"."Total Cash Collection : ".$total_cash."</th><th>"."Total Delivery Charge : ".$total_charge."</th><th>"."Total Payable Amount : ".$total_payable."</th><th>"."</th></tr>";
?>
</thread>
</table>
</body>
</html>