<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<title>table booking system</title>
<link href='http://fonts.googleapis.com/css?family=Trocchi' rel='stylesheet' type='text/css' />
<link href="css/styles.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="wrapper">
	<?php 
	if(isset($_SESSION['user']))
	{
		echo 'You are logged in as admin.  <a href="logout.php"> Logout </a>' ;
	}
	else
		echo'<a href="admin.php" style="align-text:right;"> Admin </a>';
	?>
  <div class="logo">RESTAURANT TABLE BOOKING</div>
  <div class="menu">
    <ul>
      <li><a href="#" class="active">Home</a></li>
      <li><a href="about.html">About Us</a></li>
      <li><a href="acc2.html">Reserved Status</a></li>
      <li><a href="acc.html">Book Table</a></li>
      <li><a href="contact.html">Contact Us</a></li>
    </ul>
  </div>
  <div class="header">
    <h1>Delish</h1>
    <h2> One cannot THINK well LOVE well And SLEEP well </h2>
	<h2> If One has not DINED well ... </h2>
    <div class="header-button"><a href="#">More Info</a> </div>
  </div>
  <div class="banner-container">
    <div class="banner-top"></div>
    <div class="banner-middle"> <img src="images/res.jpg" alt="themedemic" /> </div>
    <div class="banner-bottom"></div>
  </div>
</div>
<div class="panels-container">
  <div class="panel-wrapper">
    <div class="panel"> <img src="images/star.png" alt="themedemic" />
      <h1>Book Ur Tables</h1>
      <h2>You can book tables online </h2>
      <ul>
        <li class="panel-top"></li>
        <li class="panel-middle">
          <p>You can view the restaurant's map and you can book the tables according to your need. </p>
        <li class="panel-bottom"></li>
      </ul>
    </div>
    <div class="panel"> <img src="images/star.png" alt="themedemic" />
      <h1>Register</h1>
	  
      <ul>
        <li class="panel-top"></li>
        <li class="panel-middle">
          <p>To book tables you first register your details here... </p>
        <li class="panel-bottom"></li>
      </ul>
    </div>
    <div class="panel"> <img src="images/star.png" alt="themedemic" />
      <h1>Cash Details</h1>
      <h2>Pay after dine</h2>
      <ul>
        <li class="panel-top"></li>
        <li class="panel-middle">
          <p> No need to pay money for booking table.</br>
		      Pay cash after you are served.
            </p>
        <li class="panel-bottom"></li>
      </ul>
    </div>
    <div class="clear"></div>
  </div>
</div>

<div class="footer">
  <div class="copy-rights">Copyright (c) Untitled. Design by www.alltemplateneeds.com,  Photos by www.photorack.net</div>
</div>
</body>
</html>
