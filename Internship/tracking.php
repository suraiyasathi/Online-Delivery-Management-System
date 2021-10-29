<!DOCTYPE html>
<html>
<head>
	<title>Tracking</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/tracking_style.css">
  <link rel="stylesheet" type="text/css" href="css/a.css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700,800&display=swap" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <style>
    * {
  box-sizing: border-box;
}
    .column {
  float: left;
  width: 50%;
  padding: 0 10px;
  margin-top:30px;
  right: calc(50% - 50px);
  
}




@media screen and (max-width: 600px) {
  .column {
    width: 100%;
    display: block;
    margin-bottom: 20px;
  }
}
}

  </style>


  <script>

  $(document).ready(function(){
  
    $("#search").click( function(){
      document.getElementById('tracking').style.display = 'none'
      document.getElementById('container').style.display = 'none'
      var p_id=$("#track").val();
      var submit=$("#search").val();
            $(".form-message").load("track_parcel.php",{
              p_id:p_id,    
        submit:submit
             
      });
});
  });
</script>
</head>
<body>
    

  <div id="header" style="margin-bottom: 665px;">
    <div id="logo">
      <img src="images/logo.PNG">
    </div>
    <ul id="navbar">
    
      
      <li> <a href="log_out.php">Log Out</a></li>
      <li> <a href="agent_orders.php"> Parcels</a></li>
      
      
  

    </ul>
    <div class="form" >
      <div class="search">
        
            <input type="text" id="track"  name="track" placeholder="পার্সেল ID লিখুন" size="20">
          <input type="submit" id="search" name="search" value="Track Parcel">
      </div>

  </div><br><br><br><br><br><br>
  <p class="form-message"></p>
      
  </div>



  
  <div class="track" id="tracking">
    <h1> ট্র্যাক পার্সেল</h1>
    <h1> Tracking ID</h1>
    <?php
  session_start();
include 'db_connect.php';
$conn=OpenCon();
$p_id=$_SESSION['p_id']; 
?>
<p> <?php echo $p_id; ?></p>
  </div>
  <div class="container" id="container" style="margin-left: 20%;">
    <div class="column" style="text-align:left;">
     
      <ul style="list-style: none;">
  <?php 
  $picked_up='';

$sql1="select * from parcel where Product_id='$p_id'";
   
   $result1 = mysqli_query($conn,$sql1);
     if(mysqli_num_rows($result1)>0){
     while ($row1 = mysqli_fetch_assoc($result1)) {
      $agent_name=$row1['agent_name'];
      $agent_phone=$row1['agent_phone'];
      $c_name=$row1['C_name'];
     $delivery_address=$row1['Delivery_address'];

$sql2 = "select * from tracking where Product_id='$p_id'";
$result2 = mysqli_query($conn,$sql2);
     if(mysqli_num_rows($result2)>0){
     while ($row2= mysqli_fetch_assoc($result2)) {
     $picked_up=$row2['picked_up'];
     $medium=$row2['medium'];
     $delivered=$row2['delivered'];
     $payments=$row2['payments'];
     
     ?>
    
  <li style="font-size: xx-large;">
          <?php
          if($payments!=null)
          {
          ?><span>&#9745;</span>
          <?php
          }else
          {
          ?><span>&#9744;</span>
          <?php 
          }
          ?> পার্সেলের লেনদেনটি সম্পন্ন হয়েছে</li><p style="margin-left: 5%;" ><?php echo $payments; ?></p>
  
        <li style="font-size: xx-large;">
          <?php
          if($delivered!=null)
          {
          ?><span>&#9745;</span>
          <?php
          }else
          {
          ?><span>&#9744;</span>
          <?php 
          }
          ?> পার্সেল ডেলিভারি সম্পন্ন হয়েছে</li><p style="margin-left: 5%;" ><?php echo $delivered; ?></p>
        
        <li  style="font-size: xx-large; "><?php
          if($medium!=null)
          {
          ?><span>&#9745;</span>
          <?php
          }else
          {
          ?><span>&#9744;</span>
          <?php 
          }
          ?> ডেলিভারি এজেন্ট <?php echo "$agent_name ($agent_phone)"; ?> ডেলিভারির জন্যে বের হয়েছে</li><p style="margin-left: 5%;" ><?php echo $medium; ?></p>

        <li style="font-size: xx-large;"><?php
          if($picked_up!=null)
          {
          ?><span>&#9745;</span>
          <?php
          }else
          {
          ?><span>&#9744;</span>
          <?php 
          }
          ?> পার্সেল পিকাপ সম্পন্ন হয়েছে </li><p style="margin-left: 5%;" ><?php echo $picked_up; ?></p>
        
        <?php
      }}else
      {
        ?>
        <li style="font-size: xx-large;">
          <span>&#9744;</span> পার্সেলের লেনদেনটি সম্পন্ন হয়েছে</li>
        <li style="font-size: xx-large;">
          <span>&#9744;</span> পার্সেল ডেলিভারি সম্পন্ন হয়েছে</li>
        
        <li  style="font-size: xx-large; ">
          <span>&#9744;</span> ডেলিভারি এজেন্ট <?php echo "$agent_name ($agent_phone)"; ?> ডেলিভারির জন্যে বের হয়েছে</li>

        <li style="font-size: xx-large;">
          <span>&#9744;</span> পার্সেল পিকাপ সম্পন্ন হয়েছে </li>
          <?php } ?>
        </ul>
    </div>
   
    
  
  <?php
}}
?>
<div class="column" style="border-style: none; width: 40%; background: #ccccff; margin-top: -5%;">
  
  
    <h2>কাস্টমার ও অর্ডারের বিস্তারিত তথ্য</h2><br><br>
    <span style="font-size:130%; font-weight: bold;">Parcel ID : </span><span style="font-size:130%;"><?php echo "$p_id"; ?></span><br><br>
      <span style="font-size:130%; font-weight: bold;">Customer's Name : </span><span style="font-size:130%;"><?php echo "$c_name"; ?></span><br><br>
      <span style="font-size:130%; font-weight: bold;">Delivery Address : </span><span style="font-size:130%;"><?php echo "$delivery_address"; ?></span><br><br>
      <span style="font-size:130%; font-weight: bold;">Placed At : </span><span style="font-size:130%;"><?php echo "$picked_up"; ?></span><br><br>
    </div>
  </div>
  
</body>
</html>
