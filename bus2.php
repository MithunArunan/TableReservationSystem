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

<?php	if(isset($_SESSION['user']))
	{
		echo 'You are logged in as admin.  <a href="logout.php"> Logout </a>' ;
	}
	else
		echo'<a href="admin.php" style="align-text:right;"> Admin </a>';
?>

  <div class="logo">RESERVATION STATUS FOR BUSINESS
  </div>
  <div class="menu">
    <ul>
      <li><a href="index.php" class="active">Home</a></li>
    </ul>
  </div>
  </div>
     <?php
   if(isset($_SESSION['user']))
   {
		$ROOT_DIR = $_SERVER["DOCUMENT_ROOT"];
		$failCase = "";
		require('connect.php'); 
	?>

	<br><br>
  <center>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
       <table>
       <tr>
          <td>Date</td>
         <td></td>
		 <td>
		<select name="date">
		<?php
			$sqlQuery="SELECT * FROM conreserve GROUP BY date;";
			$result=mysqli_query($conn,$sqlQuery) or die('Error '.mysqli_error($conn));
			if($result)
			{	
				while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
				{
					echo "<option value=".$row['date'].">".$row['date']."</option>";
				}
			}
		?>	
		</select>
		 </td>
        </tr>
       <tr>
          <td>Session</td>
         <td></td><td>
					<select name="session" >
						<option value="1">Session 1 (9 to 12)</option>
						<option value="2">Session 2 (12 to 3)</option>
						<option value="3">Session 3 (3 to 6)</option>
						<option value="4">Session 4 (6 to 9)</option>	
					</select>
		 </td>
        </tr>
			 <tr>
             <td> </td><td></td> <td><input type="submit" name="sub" value="SEARCH"></tr>			 
		</table>
	</form>
  <center>

  
   <?php
		// Get details from the database
	
		 if($_SERVER['REQUEST_METHOD'] == "POST")
		  {
		// Get details from the database
			echo "<center><br><h2>Date:   ".$_POST['date']."</h2></center>";
			echo "<center><h2>Session: Session ".$_POST['session']."</h2></center><br>";
			$sqlQuery="SELECT * FROM conreserve ORDER BY date";
			$result=mysqli_query($conn,$sqlQuery) or die('Error '.mysqli_error($conn));
			if($result)
			{	
				if( mysqli_num_rows($result) > 0)
				{
					echo "<div class='contents'>";
					echo "<hr style='max-width:300px'> ";
					echo "<hr style='max-width:300px'> ";
					
					while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
					{
					// Format of displaying the details!!
					// Date Session and  Person reserved Tables Booked!!!
						$tbl = "Conference Table";
					echo "<h2 >".$row['name']." &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  ".$row['no']."</h2>";
					echo "<h2> ".$row['email']." &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  ".$tbl."</h2>";
					echo "<hr style='max-width:300px'> ";
					echo "<hr style='max-width:300px'> ";
					}
					echo "</div>";
				}
				else
					echo "<center><br><h2>No reservations so far</h2></center>";
			}
		  }
		}
		else
		 echo '<center><h2>Login as <a href="admin.php">admin</a> to view the reservation status.</h2></center>';
       
       ?>
    <center>
	
	<img src="images/business.jpg" alt="business"/>
	<br><br><br>
	</center>
<div class="footer">
  <div class="copy-rights">Copyright (c) Untitled. Design by www.alltemplateneeds.com,  Photos by www.photorack.net</div>
</div>
</body>
</html>
