<?php session_start(); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<title>table booking system</title>
<link href='http://fonts.googleapis.com/css?family=Trocchi' rel='stylesheet' type='text/css' />
<link href="css/styles.css" rel="stylesheet" type="text/css" />
<link href="css/homepage.css" rel="stylesheet" type="text/css" >
<link rel="stylesheet" href="css/loginStyle.css">
</head>
<body>
<div class="wrapper">
  <div class="logo">Admin Login.</div>
  <div class="menu">
    <ul>
      <li><a href="index.php" class="active">Home</a></li>
    </ul>
  </div>
  </div>
  
   <?php
	if(!isset($_SESSION['user']))
	{
		$ROOT_DIR = $_SERVER["DOCUMENT_ROOT"];
	 	$failCase = "";
		require('connect.php'); 
		if($_SERVER["REQUEST_METHOD"] == "POST")
		{
			// Get details from the form
			$name=$_POST['login'];
			$pass=$_POST['password'];
			
			
			// Authentication!
			$check = "SELECT * FROM admin WHERE name='".$name."' AND password='".$pass."';";
			//echo $check;
			$res=mysqli_query($conn,$check) or die('Error in checking the table');
			if($res)
			{
			  $count=mysqli_num_rows($res);
			}
			
			if($count == 0)
			{
				$failCase =  "<br><center><h1>Sorry! Your credentials are not valid.! </h1></center>";
			}
			else
			{
				$_SESSION['user'] = $name;
				//Relocate
				header("Location: index.php");
			}
		}
	}
	else
	header("Location: index.php");
       ?>
    <center>
	<?php echo $failCase; ?>
	</center>
	<section class="container">
     <div class="login">
      <h1>Login
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <p><input name="login" type="text" required placeholder="Username or Email" autocomplete="on"></p>
        <p><input name="password" type="password" required placeholder="Password" autocomplete="off" value=""></p>
       <!-- <span class="error"><?php echo $failCase; ?></span> -->
        <p class="remember_me">
        </p>
        <p class="submit"><input type="submit" name="commit" value="Login"></p>
      </form>
    </div>

    </section>
<div class="footer">
  <div class="copy-rights">Copyright (c) Untitled. Design by www.alltemplateneeds.com,  Photos by www.photorack.net</div>
</div>
</body>
</html>
