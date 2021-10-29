<?php
session_start();
if(isset($_POST['submit'])){
	$p_id = $_POST['p_id'];
	$phone = $_POST['phone'];
	$Date_from = $_POST['date_from'];
	$Date_to = $_POST['date_to'];
	?>
<div class="tablestyle" id="parcel" style="margin-top: 1%; ">
	<h2 style="border-bottom: 4px solid blue; width: 15%;">আপনার সব অর্ডার</h2>
	
    <table id="t01" align="corner" style="text-align: center">
	<thead>
	<tr>
		<th>Date</th>		
		<th>Customer's ID</th>
		<th>Product ID</th>
		<th>Shop Name</th>
		<th>Customer Details</th>
		<th>Status</th>
		<th>Payment Info</th>
		<th>Payment Status</th>
		<th>Action</th>
		
	</tr>
	</thead>
	<tbody>
	<?php
	
include 'db_connect.php';
$conn=OpenCon();

	
$id=$_SESSION['id'];
$sql2="select * from my_location where ID='$id' and select_address='Selected'";
   
   $result2 = mysqli_query($conn,$sql2);
     if(mysqli_num_rows($result2)>0){
     while ($row2 = mysqli_fetch_assoc($result2)) {
     $pickup_address=$row2['Pick_up_address'];
     
$sql1 = "select * from parcel where ID='$id' and Pick_up_address='$pickup_address' and (Product_id='$p_id' or Phone_num='$phone' or (date BETWEEN '$Date_from' and '$Date_to')) ORDER BY date DESC";
$result1 = mysqli_query($conn,$sql1);
     if(mysqli_num_rows($result1)>0){
     while ($row1= mysqli_fetch_assoc($result1)) {
     $date=$row1['date'];
     $id=$row1['ID'];
     $P_id=$row1['Product_id'];
     $shop=$row1['Shop_name'];
     $phone_num=$row1['Phone_num'];
     $c_name=$row1['C_name'];
     $delivery_address=$row1['Delivery_address'];
     $status=$row1['status'];
     $cash=$row1['Cash_collection'];
     $charge=$row1['delivery_charge'];
     $Payment_status=$row1['Payment_status'];	
    $action=$row1['Action'];	 
     	 
		 echo "<tr><td>".$date."</td><td>".$id."</td><td>";
     ?>
     <a href="click_track.php?p_id=<?php echo $P_id ?>"><?php echo $P_id ?></a>
     <?php
     echo "</td><td>".$shop."</td><td>";
	 echo "Name : ".$c_name.", Contact Number : ".$phone_num.", Address : ".$delivery_address."</td><td>".$status."</td><td>"."Tk. ".$cash." Cash Collection,"."\n"." Tk. ".$charge." Charge."."</td><td>".$Payment_status."</td><td>";
   if($action!='Canceled')
   {
	 
?><br>

<a href="edit_parcel.php?p_id=<?php echo $P_id ?>" onclick="return confirm('Are you sure?')">Edit</a><br><br>
<a href="cancel_parcel.php?p_id=<?php echo $P_id ?>" onclick="return confirm('Are you sure?')">Cancel</a><br>
<?php 
}
else
{
  echo $action;
}
echo "</td></tr>";

		 }
		 }}}?>
</tbody>
	 </table>
</div>
<?php 
}
?> 