
<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Order History</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/a.css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700,800&display=swap" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	

	<style>
	
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
  color: black;
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

  $(document).ready(function(){
  
    $("#submit").click( function(){
      document.getElementById('parcels').style.display = 'none'      
        var p_id=$("#p_id").val();
        var phone=$("#phone").val();
        var date_from=$("#date1").val();
        var date_to=$("#date2").val();
        var submit=$("#submit").val();
            $(".form-message").load("specific.php",{
              p_id:p_id,
              phone:phone,
              date_from:date_from,
              date_to:date_to,  
              submit:submit
             
      });
});

    $("form").submit(function(event){
      event.preventDefault();
      document.getElementById('box').style.display = 'none'
      document.getElementById('parcels').style.display = 'none'
      var p_id=$("#track").val();
      var submit=$("#search").val();
      $(".form-messages").load("track_parcel.php",{
         p_id:p_id,    
        submit:submit
      });
    });
});
</script>
</head>
<body><div id="header">
    <div id="logo">
      <img src="images/logo.PNG">
    </div>
    <ul id="navbar">
      <li> <a href="log_out.php">Log Out</a></li>
    <li> <a href= "my_payment.php"> Payment Info </a> </li>
    <li> <a href= "my_location.php"> My Location </a> </li>
     <li> <a href="payments.php"> Payments</a></li>
     <li> <a href="parcel.php"> Create Parcel</a></li>
      
      
      
      
      

    </ul>
    <div class="search">
        <form action="track_parcel.php" method = "POST">
            <input type="text" id="track"  name="track" placeholder="পার্সেল ID লিখুন" size="20">
          <input type="submit" id="search" name="search" value="Track Parcel">
      
    </form>
      </div>
  </div>
	
	<div class="show" style="margin-top: 3%;">

	<div class="form">
        <div class="box" id="box">
        <input type="text" id="p_id" name="p_id" placeholder="Product ID" size="40">&nbsp;&nbsp;
        <input type="text" id="phone" name="phone" placeholder="Phone Number" size="40">&nbsp;&nbsp;
        <input type="text" id="date1" name="date1" placeholder="Date from" onfocus="(this.type='date')" size="17">&nbsp;
        <input type="text" id="date2" name="date2" placeholder="Date to" onfocus="(this.type='date')" size="17">&nbsp;
        <input type="submit" id="submit" name="submit" value="Search">
    <p class="form-message"></p>
  </div>
    <p class="form-messages"></p>
    </div>
</div>
	<div class="tablestyle" id="parcels" style="margin-top: 2%; display: block;">
	<h2 style="border-bottom: 4px solid blue; width: 15%;">আপনার সব অর্ডার</h2>
    <table id="t01" align="corner" style="text-align: center">
	<thead>
	<tr>
		<th>Date</th>		
		<th>Merchant's ID</th>
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
          
$sql1 = "select * from parcel where ID='$id' and Pick_up_address='$pickup_address' ORDER BY date DESC";
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
     $cash=$row1['Cash_collection'];
     $charge=$row1['delivery_charge'];
     $status=$row1['status'];
     $Payment_status=$row1['Payment_status'];	
    $action=$row1['Action'];	 
     	 
		 echo "<tr><td>".$date."</td><td>".$id."</td><td>";
     ?>
     <a href="click_track.php?p_id=<?php echo $P_id ?>"><?php echo $P_id ?></a>
     <?php
     echo "</td><td>".$shop."</td><td>";
	 echo "Name : ".$c_name.", Contact Number : ".$phone_num.", Address : ".$delivery_address."</td><td>".$status."</td><td>"."Tk. ".$cash." Cash Collection,"."\n"." Tk. ".$charge." Charge."."</td><td>".$Payment_status."</td><td>";
   if($action!='Canceled' && $action!='Complete')
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
</body>
</html>