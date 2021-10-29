<?php
session_start();
if(isset($_POST['submit'])){
	$Date_from = $_POST['date_from'];
	$Date_to = $_POST['date_to'];
	?>

	<div class="tablestyle" id="parcel" style="margin-top: 5%; display: block; ">
	
    <table id="t01" align="corner" style="text-align: center">
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
	//session_start();
include 'db_connect.php';
$conn=OpenCon();
$total_cash=0;
$total_charge=0;
$total_payable=0;
	
$id=$_SESSION['id'];
$sql1 = "SELECT * FROM parcel where Payment_status='Not settled' and ID='$id' and Action!='Canceled' and (date BETWEEN '$Date_from' and '$Date_to') ORDER BY date DESC;";
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
<div class="calc">
<table id="t02" align="center" style="margin-left: 12%; width: 60%;">
  <thead>
<?php 
echo "<tr><th>"."</th><th>"."Total Cash Collection : ".$total_cash."</th><th>"."Total Delivery Charge : ".$total_charge."</th><th>"."Total Payable Amount : ".$total_payable."</th><th>"."</th></tr>";
?>
</thread>
</table>
</div>
<?php 
}
?> 