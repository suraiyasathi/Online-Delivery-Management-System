<?php
session_start();
if(isset($_POST['submit'])){
	$p_id = $_POST['p_id'];
	$phone = $_POST['phone'];
	$Date_from = $_POST['date_from'];
	$Date_to = $_POST['date_to'];
	?>
<div class="tablestyle" id="parcel" style="margin-top: 1%; ">
	
    <table id="t01" align="corner" style="text-align: center">
	<thead>
	<tr>
		<th>Serial</th>	
    <th>Date</th> 	
		<th>Product ID</th>
		<th>Pick-up Address</th>
		<th>Delivery Address</th>
    <th>Customer Details</th>
    <th>Instructions</th>
		<th>Status</th>
	</tr>
	</thead>
	<tbody>
	<?php
	
include 'db_connect.php';
$conn=OpenCon();
$serial=1;
$Name=$_SESSION['Name'];  	
     
$sql1 = "select * from parcel where agent_name='$Name' and (Product_id='$p_id' or Phone_num='$phone' or (date BETWEEN '$Date_from' and '$Date_to')) ORDER by date desc";
$result1 = mysqli_query($conn,$sql1);
     if(mysqli_num_rows($result1)>0){
     while ($row1= mysqli_fetch_assoc($result1)) {
     $date=$row1['date'];
     $P_id=$row1['Product_id'];
     $phone_num=$row1['Phone_num'];
     $c_name=$row1['C_name'];
     $pickup_address=$row1['Pick_up_address'];
     $delivery_address=$row1['Delivery_address'];
     $status=$row1['status'];
     $I=$row1['Instructions'];	 
     	 
		 echo "<tr><td>".$serial."</td><td>".$date."</td><td>";
     ?>
     <a href="tracking_info.php?p_id=<?php echo $P_id ?>" ><?php echo $P_id ?></a>
     <?php
     echo "</td><td>".$pickup_address."</td><td>";
	 echo $delivery_address."</td><td>"."Name : ".$c_name.", Contact Number : ".$phone_num."</td><td>".$I."</td><td>".$status."</td><tr>";
$serial++;
		 }
		 }?>
</tbody>
	 </table>
</div>
<?php 
}
?> 
