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
	
include 'db_connect.php';
$conn=OpenCon();
$total_cash=0;
$total_charge=0;
$total_payable=0;
	
$id=$_SESSION['id'];
$sql1 = "SELECT Payment_status,date,SUM(cash_collection) as cash, SUM(delivery_charge) as charge
FROM parcel where ID='$id' and Action!='Canceled' and (date BETWEEN '$Date_from' and '$Date_to') group by date;";
$result1 = mysqli_query($conn,$sql1);
     if(mysqli_num_rows($result1)>0){
     while ($row1= mysqli_fetch_assoc($result1)) {
     $date=$row1['date'];
     $cash=$row1['cash'];
     $charge=$row1['charge'];
     $status=$row1['Payment_status'];
     $payable=$cash-$charge;

     if($status!='Settled')
     {

     $total_cash=$total_cash+$cash;
     $total_charge=$total_charge+$charge;
     $total_payable=$total_payable+$payable;
   }     
     	 
		 echo "<tr><td>";
     ?>
	 
<a href="payments_details.php?date=<?php echo $date ?>"><?php echo $date ?></a>

<?php echo "</td><td>".$cash."</td><td>".$charge."</td><td>".$payable."</td><td>".$status."</td></tr>";
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