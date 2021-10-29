
<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Payments</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/a.css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700,800&display=swap" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	
<script>
$(document).ready(function(){
  $("#submit").click( function(){
      document.getElementById('parcels').style.display = 'none'
      document.getElementById('calc').style.display = 'none'      
        
        var date_from=$("#date1").val();
        var date_to=$("#date2").val();
        var submit=$("#submit").val();
            $(".form-message").load("admin_payments_specific.php",{
              
              date_from:date_from,
              date_to:date_to,  
              submit:submit
             
      });
});


    
});
</script>

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
     <li> <a href="orders.php"> Parcels</a></li>
     <li> <a href="payments.php"> Payments</a></li>
      
      
      
      
      

    </ul>
    
  </div>
	
	<h2 style="border-bottom: 4px solid blue; width: 15%; margin-left: 5%; margin-top: 3%;">Payments Summary</h2>
  <div class="show" >

  <div class="form">
        <div class="box" id="box" style="float: right; margin-right: 5%;">
        <input type="text" id="date1" name="date1" placeholder="Date from" onfocus="(this.type='date')" size="17">&nbsp;
        <input type="text" id="date2" name="date2" placeholder="Date to" onfocus="(this.type='date')" size="17">&nbsp;
        <input type="submit" id="submit" name="submit" value="Search">
      </div>
    <p class="form-message"></p>
    </div>
</div>
	<div class="tablestyle" id="parcels" style="margin-top: 5%; display: block;">
	
    <table id="t01" align="center" style="text-align: center">
	<thead>
	<tr>
		<th>Date</th>		
		<th>Cash Collection(Tk.)</th>
		<th>Delivery Charge(Tk.)</th>
		<th>Payable Amount(Tk.)</th>
		<th>Amount Paid Out(Tk.)</th>
		
		
	</tr>
	</thead>
	<tbody>
	<?php
	
include 'db_connect.php';
$conn=OpenCon();
$total_cash=0;
$total_charge=0;
$total_payable=0;

$id = $_GET['id'];	
$_SESSION['id']=$id;;
$sql1 = "SELECT * FROM parcel where Payment_status='Not settled' and ID='$id' and Action!='Canceled' ORDER BY date DESC;";
$result1 = mysqli_query($conn,$sql1);
     if(mysqli_num_rows($result1)>0){
     while ($row1= mysqli_fetch_assoc($result1)) {
     $date=$row1['date'];
     $p_id=$row1['Product_id'];
     $cash=$row1['Cash_collection'];
     $charge=$row1['delivery_charge'];
     $payable=$cash-$charge;

     $total_cash=$total_cash+$cash;
     $total_charge=$total_charge+$charge;
     $total_payable=$total_payable+$payable;
     
     	 
		 echo "<tr><td>".$date."</td><td>".$cash."</td><td>".$charge."</td><td>".$payable."</td><td>";	 
?>
<a href="pay_off.php?id=<?php echo $id; ?>& p_id=<?php echo $p_id; ?>"><?php echo "Pay off $payable Tk."; ?></a>
<?php
echo "</td></tr>";
     }
     }?>
</tbody>

	 </table>
</div>
<div class="calc" id="calc">
<table id="t02" align="center" style="margin-left: 12%; width: 60%;">
  <thead>
<?php 
echo "<tr><th>"."</th><th>"."Total Cash Collection : ".$total_cash."</th><th>"."Total Delivery Charge : ".$total_charge."</th><th>"."Total Payable Amount : ".$total_payable."</th><th>"."</th></tr>";
?>
</thread>
</table>
</div>
</body>
</html>