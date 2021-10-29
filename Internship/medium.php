<?php
  session_start();
  $option = $_GET['option'];
  $_SESSION['option']=$option;
  $address = $_GET['address'];
  $_SESSION['address']=$address;
  $first_time=false;
  $_SESSION['first_time']=$first_time;
  header('location:add_location.php');
  
   ?>