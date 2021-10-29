<!DOCTYPE html>
<html>
<head>
	<title>Unishopr product to purchase</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/index_style.css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700,800&display=swap" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

  <script>

  $(document).ready(function(){
  
    $("#search").click( function(){
      document.getElementById('box').style.display = 'none'
      
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
  <div id="header" style="margin-bottom: 43%;">
    <div id="logo">
      <img src="images/logo.PNG">
    </div>
    <ul id="navbar">
     
      <li> <a href="#">Call 01234578965</a></li>
    </ul>
    <div class="form" >
      <div class="search">
        
            <input type="text" id="track"  name="track" placeholder="পার্সেল ID লিখুন" size="20">
          <input type="submit" id="search" name="search" value="Track Parcel">
      </div>

  </div>
  <p class="form-message"></p>
      </div>

  <div class="cont" id="box">
    <div class="form sign-in">
      <h2>Sign In</h2>
      <form id="login" action="loginconf.php" method="post" >
      <label>
        <span>Email Address</span>
        <input type="email" name="email" required>
      </label>
      <label>
        <span>Password</span>
        <input type="password" name="pass" required>
      </label>
      <input type="submit" class="submit" name="submit" value="sign in">
  </form>
      <p class="forgot-pass">Forgot Password ?</p>

     
    </div>

    <div class="sub-cont">
      <div class="img">
        <div class="img-text m-up">
          <h2>New here?</h2>
          <p>Sign up and discover  and purchase great amount of products of different countries</p>
        </div>
        <div class="img-text m-in">
          <h2>One of us?</h2>
          <p>If you already has an account, just sign in. </p> <p>Thank you for suporting us😊</p>
        </div>
        <div class="img-btn">
          <span class="m-up">Sign Up</span>
          <span class="m-in">Sign In</span>
        </div>
      </div>
      
      <div class="form sign-up">
        <h2>Sign Up</h2>
        <form id="register" action="registration.php" method="post" >
        <label>
          <span>Name <font color= "red" size="3"> * </font></span>
          <input type="text" name="name" required>
        </label>
        <label>
          <span>Email <font color= "red" size="3"> * </font></span>
          <input type="email" name="email" required>
        </label>
        <label>
          <span>Password <font color= "red" size="3"> * </font></span>
          <input type="password" name="pass" required>
        </label>
        <label>
          <span>Confirm Password <font color= "red" size="3"> * </font></span>
          <input type="password" name="conf_pass" required>
        </label>
    
        <input type="submit" class="submit" name="submit" value="sign up now">
    </form>
    
      </div>

    </div>
  </div>
<script type="text/javascript" src="script.js"></script>


  </body>
  </html>
