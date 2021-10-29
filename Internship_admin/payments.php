
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
  margin-left: 5%;
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
	
</style>
<script>

 
</script>
</head>
<body><div id="header">
    <div id="logo">
      <img src="images/logo.PNG">
    </div>
    <ul id="navbar">
      <li> <a href="log_out.php">Log Out</a></li>
      <li> <a href="orders.php"> Parcels</a></li>
      
      
      
      
      

    </ul>
    
  </div>
	
	
	<div class="tablestyle" id="parcels" style="margin-top: 5%; display: block;">
	
    <table id="t01" align="corner" style="text-align: center">
	<thead>
	<tr>
		<th>Merchant's ID</th>		
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

	
$id=$_SESSION['id'];
$sql1 = "SELECT ID,date,SUM(cash_collection) as cash, SUM(delivery_charge) as charge
FROM parcel where Payment_status='Not settled' and Action!='Canceled' group by ID;";
$result1 = mysqli_query($conn,$sql1);
     if(mysqli_num_rows($result1)>0){
     while ($row1= mysqli_fetch_assoc($result1)) {
     $date=$row1['date'];
     $ID=$row1['ID'];
     $cash=$row1['cash'];
     $charge=$row1['charge'];
     $payable=$cash-$charge;
     
     	 
		 echo "<tr><td>";
     ?>
	 
<a href="payments_details.php?id=<?php echo $ID; ?>"><?php echo $ID; ?></a>

<?php echo "</td><td>".$cash."</td><td>".$charge."</td><td>".$payable."</td><td>";
?>
<a href="pay_off_total.php?id=<?php echo $ID; ?>"><?php echo "Pay off $payable Tk."; ?></a>
<?php
echo "</td></tr>";
		 }
		 }?>
</tbody>
	 </table>
</div>
</body>
</html>